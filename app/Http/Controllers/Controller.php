<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use App\Models\Model;
use App\Models\Vehicle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __invoke()
    {
        $manufacturers = Manufacturer::select([
            'name',
            'founded_year',
            'image'
        ])  ->orderByDesc('updated_at')
            ->paginate(3, ['*'], 'manufacturers');

        $models = Model::select([
            'manufacturer_id',
            'name',
            'image'
        ])  ->orderByDesc('updated_at')
            ->paginate(3, ['*'], 'models');

        $vehicles = Vehicle::select([
            'manufacturer_id',
            'model_id',
            'production_year',
            'kilometer_age'
        ])  ->orderByDesc('updated_at')
            ->paginate(3, ['*'], 'vehicles');

        return view('index', [
            'manufacturers' => $manufacturers,
            'models' => $models,
            'vehicles' => $vehicles,
        ]);
    }
}
