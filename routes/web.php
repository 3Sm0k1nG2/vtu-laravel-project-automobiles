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

Route::get('/', [Controller::class, 'index'])
    ->name('index');

Route::get('/manufacturers/{id?}', [Controller::class, 'manufacturers'])
    ->whereNumber('id')
    ->name('manufacturers');

Route::get('/models/{id?}', [Controller::class, 'models'])
    ->whereNumber('id')
    ->name('models');

Route::get('/vehicles/{id?}', [Controller::class, 'vehicles'])
    ->whereNumber('id')
    ->name('vehicles');

