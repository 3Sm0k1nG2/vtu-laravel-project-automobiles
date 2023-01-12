<?php

namespace App\Http\Controllers;

use App\Models\Model;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        return view('model.index', [
            'models' => Model::orderByDesc('updated_at')
                ->limit(5)
                ->get()
        ]);
    }

    public function show($id){
        return view('model.show', [
            'model' => Model::findOrFail($id)
        ]);
    }
}
