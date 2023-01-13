<?php

use App\Http\Controllers\Api\ModelApiController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\VehicleController;
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

// API
Route::prefix('api')->group(function () {
    Route::get('/models', [ModelApiController::class, 'getMany'])
        ->name('api.model');
    Route::fallback(function (){
        return response()->json([
            'message' => 'Endpoint not found',
        ], 404);
    });
});

// MVC
Route::get('/', Controller::class)
    ->name('index');

Route::get('/manufacturers', [ManufacturerController::class, 'index'])
    ->name('manufacturer.index');
Route::get('/manufacturers/{id}', [ManufacturerController::class, 'show'])
    ->whereNumber('id')
    ->name('manufacturer.show');

Route::get('/models', [ModelController::class, 'index'])
    ->name('model.index');
Route::get('/models/{id}', [ModelController::class, 'show'])
    ->whereNumber('id')
    ->name('model.show');

Route::get('/vehicles', [VehicleController::class, 'index'])
    ->name('vehicle.index');
Route::get('/vehicles/{id}', [VehicleController::class, 'show'])
    ->whereNumber('id')
    ->name('vehicle.show');
