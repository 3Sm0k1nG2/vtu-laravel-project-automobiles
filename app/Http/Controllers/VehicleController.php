<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        return view('vehicle.index', [
            'vehicles' => Vehicle::orderByDesc('updated_at')
                ->limit(5)
                ->get()
        ]);
    }

    public function show($id){
        return view('vehicle.show', [
            'vehicle' => Vehicle::findOrFail($id)
        ]);
    }
}
