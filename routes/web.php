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
    Route::resource('district', 'DistrictController');
    Route::resource('place', 'PlaceController');
    Route::resource('reports', 'ReportController');
    Route::post('approve', 'ReportController@approve')->name('approve');
});
Route::group(['prefix' => 'member'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('reviews', 'ReviewController');
    Route::post('removereview', 'ReviewController@removeReview')->name('removeReview');
    Route::post('sendreport', 'ReportController@sendReport')->name('sendreport');
    Route::post('likereviews', 'ReviewController@favorite');
    Route::post('deleteimage', 'ReviewController@remove')->name('remove');
    Route::post('comment', 'ReviewController@comment');
    Route::post('updatecomment', 'ReviewController@updateComment');
    Route::post('deletecomment', 'ReviewController@deleteComment');
    Route::group(['prefix' => 'user'], function () {
        Route::get('edit/{id}', 'UserController@edit')->name('editprofile');
        Route::get('wall/{id}', 'UserController@mywall')->name('mywall');
    });

});
Route::get('/get-places', 'SearchController@getPlaces');
Route::get('/get-dists', 'SearchController@getDists');
