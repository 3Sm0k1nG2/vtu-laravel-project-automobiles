<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        return view('vehicle.index');
    }

    public function show($id){
        return view('vehicle.show');
    }
}
