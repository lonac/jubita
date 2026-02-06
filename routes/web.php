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


Route::namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('login', 'LoginController@loginForm')->name('login');
    Route::post('login', 'LoginController@authenticate')->name('auth.login');
});

//Authenticated
Route::middleware('auth')->namespace('App\Http\Controllers')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

 
    //Accountant 
      Route::prefix('accountant')->name('accountant.')->group(function () {
        Route::resource('loans','Accountant\LoanController');
        Route::resource('overdues','Accountant\OverdueController');

    });



     //Expenses 
    Route::prefix('expenses')->name('expenses.')->group(function () {
        Route::resource('expenses','ExpenseController');
    });




    
    //Configurations 
    Route::prefix('configure')->name('settings.')->group(function () {
        Route::resource('staff','Configure\StaffController');
        Route::resource('categories','Configure\CategoryController');
        Route::resource('post_type','Configure\PostTypeController');
        Route::resource('role','Configure\RoleController');

    });


});



