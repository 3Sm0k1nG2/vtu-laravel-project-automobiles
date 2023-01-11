<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(/*Type $var = null*/)
    {
        return view('index');
    }

    public function manufacturers(/*Type $var = null*/)
    {
        return view('manufacturers');
    }

    public function models(/*Type $var = null*/)
    {
        return view('models');
    }

    public function vehicles(/*Type $var = null*/)
    {
        return view('vehicles');
    }
}
