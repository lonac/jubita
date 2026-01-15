<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('App\Http\Controllers\Website')->group(function () {
    Route::resource('masoko', 'MasokoController');
});

