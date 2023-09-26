<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Define a group of routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Define resource routes for the CompanyController
    Route::resource('companies', CompanyController::class);

    // Define resource routes for the EmployeeController
    Route::resource('employees', EmployeeController::class);
});
