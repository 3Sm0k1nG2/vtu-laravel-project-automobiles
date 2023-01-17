<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Model;
use App\Models\Vehicle;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke()
    {
        $where_query_params = [
            'man_year' => Request::get('man_year'),
            'mod_man' => Request::get('mod_man'),
            'veh_man' => Request::get('veh_man'),
            'veh_mod' => Request::get('veh_mod'),
            'veh_year' => Request::get('veh_year'),
        ];

        $map = [
            'man_year' => 'founded_year',
            'mod_man' => 'manufacturer_id',
            'veh_man' => 'manufacturer_id',
            'veh_mod' => 'model_id',
            'veh_year' => 'production_year',
        ];

        $where = [
            'manufacturers' => [],
            'models' => [],
            'vehicles' => [],
        ];

        foreach($where_query_params as $key => $value){
            switch (substr($key, 0, 3)) {
                case 'man':
                    if($value){
                        $where['manufacturers'] += [$map[$key] => $value];
                    }
                    break;
                case 'mod':
                    if($value){
                        $where['models'] += [$map[$key] => $value];
                    }
                    break;
                case 'veh':
                    if($value){
                        $where['vehicles'] += [$map[$key] => $value];
                    }
                    break;
                default:
                    throw new Exception('Key not in query params: ' . $key);
                    break;
            }
        }

        $manufacturers = Manufacturer::select([
            'name',
            'founded_year',
            'image'
        ])  ->where($where['manufacturers'])
            ->orderByDesc('id')
            ->paginate(3, ['*'], 'manufacturers');

        $models = Model::select([
            'manufacturer_id',
            'name',
            'image'
        ])  ->where($where['models'])
            ->orderByDesc('id')
            ->paginate(3, ['*'], 'models');

        $vehicles = Vehicle::select([
            'manufacturer_id',
            'model_id',
            'production_year',
            'kilometer_age'
        ])  ->where($where['vehicles'])
            ->orderByDesc('id')
            ->paginate(3, ['*'], 'vehicles');

        return view('index', [
            'manufacturers' => $manufacturers,
            'models' => $models,
            'vehicles' => $vehicles,
        ]);
    }
}
