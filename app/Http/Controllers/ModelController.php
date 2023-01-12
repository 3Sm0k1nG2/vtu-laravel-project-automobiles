<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        return view('model.index');
    }

    public function show($id){
        return view('model.show');
    }
}
