<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index()
    {
        return view('manufacturer.index');
    }

    public function show($id){
        return view('manufacturer.show');
    }
}
