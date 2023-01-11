<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vehicles = [
            [
                'model_id' => 1,
                'production_year' => 1956, 
                'kilometer_age' => 14553
            ],
            [
                'model_id' => 2,
                'production_year' => 2006, 
                'kilometer_age' => 56422
            ],
            [
                'model_id' => 2,
                'production_year' => 2023,
                'kilometer_age' => 0
            ],
            [
                'model_id' => 3,
                'production_year' => 1990, 
                'kilometer_age' => 21009
            ],
            [
                'model_id' => 4,
                'production_year' => 2018, 
                'kilometer_age' => 15000
            ],
        ];

        foreach($vehicles as $key => $value){
            Vehicle::create($value);
        }
    }
}
