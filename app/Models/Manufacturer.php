<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Manufacturer extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'manufacturers';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($manufacturer) {
            if($manufacturer->image){
                Storage::delete(Str::replaceFirst('storage/', 'public/', $manufacturer->image));
            }
        });
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        // destination path relative to the disk above
        $destination_path = "images/manufacturers";

        if ($value != $this->{$attribute_name} && $this->{$attribute_name}) {
            Storage::delete(Str::replaceFirst('storage/', 'public/', $this->{$attribute_name}));
        }

        // if the image was erased
        if ($value == null) {
            // delete the image from disk
            Storage::delete(Str::replaceFirst('storage/', 'public/', $this->{$attribute_name}));

            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }

        $disk = "public";
        $file_name = md5($value->getClientOriginalName() . random_int(1, 9999) . time()) . '.' . $value->getClientOriginalExtension();

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path, $file_name);
        $this->attributes[$attribute_name] = 'storage/' . $this->attributes[$attribute_name];

        $this->resizeImage($file_name);
    }

    private function resizeImage($file_name)
    {
        $file_path = "\storage\images\manufacturers\\";
        Image::make(public_path() . $file_path . $file_name)
            ->resize(512, null, function ($constraint) {
                $constraint->aspectRatio();
            })
            ->save(public_path() . $file_path . $file_name);
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
