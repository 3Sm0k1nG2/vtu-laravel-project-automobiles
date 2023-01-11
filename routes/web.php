<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [Controller::class, 'index']);
Route::get('/manufacturers', [Controller::class, 'manufacturers']);
Route::get('/vmodels', [Controller::class, 'vmodels']);
Route::get('/vehicles', [Controller::class, 'vehicles']);