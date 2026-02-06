<?php

use Illuminate\Support\Facades\Route;


Route::namespace('App\Http\Controllers\Website')->group(function () {
    Route::get('/', 'PagesController@index')->name('home');
    Route::get('/masoko', 'PagesController@masoko')->name('masoko');
    Route::get('/biashara', 'PagesController@biashara')->name('biashara');
    Route::get('/fedha', 'PagesController@fedha')->name('fedha');
    Route::get('/jiopolitiki', 'PagesController@jiopolitiki')->name('jiopolitiki');
    Route::get('/mawasiliano', 'PagesController@mawasiliano')->name('mawasiliano');
    Route::get('/teknolojia', 'PagesController@teknolojia')->name('teknolojia');
    Route::get('/uchumi', 'PagesController@uchumi')->name('uchumi');

});

Route::prefix('website')->namespace('App\Http\Controllers\Website')->group(function () {
    Route::resource('masoko', 'MasokoController');
    Route::resource('biashara', 'BiasharaController');
    Route::resource('fedha', 'FedhaController');
    Route::resource('jiopolitiki', 'JiopolitikiController');
    Route::resource('mawasiliano', 'MawasilianoController');
    Route::resource('teknolojia', 'TecknolojiaController');
    Route::resource('uchumi', 'UchumiController');

});

