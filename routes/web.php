<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('countriess', CountryController::class)->except('show');
Route::resource('statess', StateController::class)->except('show');
Route::resource('citiess', CityController::class)->except('show');
Route::resource('departments', DepartmentController::class)->except('show');


Route::get('/employees', function () {
    return view('employees.index');
});

Route::get('/countries', function () {
    return view('countries.index');
});

Route::get('/cities', function () {
    return view('cities.index');
});

Route::get('/states', function () {
    return view('states.index');
});