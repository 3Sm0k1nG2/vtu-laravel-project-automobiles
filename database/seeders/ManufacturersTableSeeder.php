<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Manufacturer;

class ManufacturersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $manufacturers = [
            [
                'name' => 'Avia',
                'founded_year' => 1919
            ],
            [
                'name' => 'Elfin Sports Cars',
                'founded_year' => 1959
            ],
            [
                'name' => 'Škoda Auto',
                'founded_year' => 1925
            ]
        ];

        foreach($manufacturers as $key => $value){
            Manufacturer::create($value);
        }
    }
}
