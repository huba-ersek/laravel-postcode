<?php

use App\Http\Controllers\CountiesController;
use App\Http\Controllers\CitiesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('counties', CountiesController::class);
Route::resource('cities', CitiesController::class);