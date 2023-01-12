<?php

namespace App\Http\Controllers;

use App\Models\Manufacturer;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function index()
    {
        return view('manufacturer.index', [
            'manufacturers' => Manufacturer::orderByDesc('updated_at')
                ->paginate(2)
        ]);
    }

    public function show($id){
        return view('manufacturer.show',[
            'manufacturer' => Manufacturer::find($id)
        ]);
    }
}
