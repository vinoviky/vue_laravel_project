<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\StateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees/countries', [EmployeeController::class, 'countries']);
Route::get('/employees/{country}/states', [EmployeeController::class, 'states']);
Route::get('/employees/departments', [EmployeeController::class, 'departments']);
Route::get('/employees/{state}/cities', [EmployeeController::class, 'cities']);

Route::apiResource('/employees', EmployeeController::class);

Route::resource('/countries', CountryController::class);
Route::get('/cities/states', [CityController::class, 'states']);
Route::resource('/cities', CityController::class);

Route::get('/states/countries', [StateController::class, 'countries']);
Route::resource('/states', StateController::class);
