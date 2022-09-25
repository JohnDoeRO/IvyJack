<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => false]);
Route::get('/', function () {
    return view('welcome');
});



Route::resource('companies', App\Http\Controllers\CompanyController::class)->only('index');
Route::resource('employees', App\Http\Controllers\EmployeeController::class);
