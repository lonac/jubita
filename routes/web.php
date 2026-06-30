<?php

use Illuminate\Support\Facades\Route;



Route::middleware(['throttle:60,1'])->namespace('App\Http\Controllers\Website')->group(function () {
    Route::get('/', 'PagesController@index')->name('home');
    Route::get('/article/{slug}', 'PagesController@showArticle')->name('article.show');
    Route::get('/category/{slug}', 'PagesController@showCategory')->name('category.show');
    Route::get('/masoko', 'PagesController@masoko')->name('masoko');
    Route::get('/biashara', 'PagesController@biashara')->name('biashara');
    Route::get('/fedha', 'PagesController@fedha')->name('fedha');
    Route::get('/jiopolitiki', 'PagesController@jiopolitiki')->name('jiopolitiki');
    Route::get('/mawasiliano', 'PagesController@mawasiliano')->name('mawasiliano');
    Route::get('/teknolojia', 'TecknolojiaController@index')->name('teknolojia');
    Route::get('/uchumi', 'PagesController@uchumi')->name('uchumi');
    Route::get('/advisory', 'AdvisoryController@index')->name('advisory');
    Route::get('/reviews', 'ReviewsController@index')->name('reviews');

    // Marketplace / Bidhaa routes
    Route::get('/bidhaa', 'MarketplaceController@index')->name('marketplace.index');
    Route::get('/bidhaa/kategoria/{slug}', 'MarketplaceController@byCategory')->name('marketplace.category');
    Route::get('/bidhaa/{slug}', 'MarketplaceController@show')->name('marketplace.show');
    Route::get('/magari', 'MarketplaceController@vehicles')->name('marketplace.vehicles');

    // Market Prices
    Route::get('/bei-za-soko', 'PagesController@marketPrices')->name('market.prices');
});

Route::prefix('website')->namespace('App\Http\Controllers\Website')->group(function () {
    Route::resource('masoko', 'MasokoController');
    Route::resource('biashara', 'BiasharaController');
    Route::resource('fedha', 'FedhaController');
    Route::resource('jiopolitiki', 'JiopolitikiController');
    Route::resource('mawasiliano', 'MawasilianoController');
    Route::resource('teknolojia', 'TecknolojiaController');
    Route::resource('uchumi', 'UchumiController');
    Route::resource('advisory', 'AdvisoryController');
    Route::resource('reviews', 'ReviewsController');
});


Route::namespace('App\Http\Controllers\Auth')->group(function () {
    Route::get('login', 'LoginController@loginForm')->name('login');
    Route::post('login', 'LoginController@authenticate')->name('auth.login');
});

//Authenticated
Route::middleware('auth')->namespace('App\Http\Controllers')->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

 
/*
    //Accountant 
      Route::prefix('accountant')->name('accountant.')->group(function () {
        Route::resource('loans','Accountant\LoanController');
        Route::resource('overdues','Accountant\OverdueController');

    });
*/



     //content 
    Route::prefix('content')->name('content.')->group(function () {
        Route::resource('content','Content\ContentController');
    });

      //content 
      Route::prefix('product')->name('product.')->group(function () {
        Route::resource('product','Product\ProductController');
    });


    //Market 
    Route::prefix('market')->name('market.')->group(function () {
        Route::resource('market_price','Market\MarketPriceController');
    });
    


    
    //Configurations 
    Route::prefix('configure')->name('settings.')->group(function () {
        Route::resource('staff','Configure\StaffController');
        Route::resource('categories','Configure\CategoryController');
        Route::resource('post_type','Configure\PostTypeController');
        Route::resource('role','Configure\RoleController');
        Route::resource('commodity_type','Configure\CommodityTypeController');
    });


});



