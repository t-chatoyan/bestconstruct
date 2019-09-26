<?php

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

Route::get('/', 'HomeController@index');

Auth::routes();
Route::post('/offer/send', 'OfferController@store');
Route::post('/message/send', 'ContactController@sendMessage');


Route::group(['prefix' => 'admin', 'middleware'=>'auth'], function () {
    // Admin dashboard
    Route::get('/', 'AdminHomeController@index')->name('admin');
    // Slider
    Route::post('/slider/update-order', 'SliderController@change_image_order');
    Route::resource('/slider', 'SliderController');
    Route::resource('/category', 'CategoryController');
    Route::resource('/portfolio', 'PortfolioController');
    Route::resource('/feedback', 'FeedbackController');
    Route::resource('/team', 'TeamController');
    Route::resource('/offer', 'OfferController');
    Route::get('/delete-img/{id}', 'PortfolioController@destroyImage');
    Route::get('/make-mean-img/{id}', 'PortfolioController@makeMainImg');
});