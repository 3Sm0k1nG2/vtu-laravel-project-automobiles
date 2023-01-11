<?php

namespace Database\Seeders;

use App\Models\Model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $models = [
            [
                'name' => 'MK3',
                'manufacturer_id' => 1
            ],
            [
                'name' => 'Elfin MS8 Streamliner',
                'manufacturer_id' => 2
            ],
            [
                'name' => 'Crusader',
                'manufacturer_id' => 2
            ],
            [
                'name' => 'Fabia R5',
                'manufacturer_id' => 3
            ]
        ];

        foreach($models as $key => $value){
            Model::create($value);
        }
    }
}
