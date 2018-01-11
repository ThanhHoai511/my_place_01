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
Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('users', 'UserController');
    Route::resource('category', 'CategoryController');
    Route::resource('city', 'CityController');
});
Route::group(['prefix' => 'member'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('reviews', 'ReviewController');
    Route::post('reviews', 'ReviewController@favorite');
    Route::group(['prefix' => 'user'], function () {
        Route::get('edit/{id}', 'UserController@edit')->name('editprofile');
    });
});
Route::get('/get-places', 'SearchController@getPlaces');
