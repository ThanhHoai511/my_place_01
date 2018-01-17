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
    Route::get('listplace', 'PlaceController@listPlace')->name('listplace');
    Route::get('previewplade/{id}', 'PlaceController@previewPlade')->name('previewplade');
    Route::post('deleteplace', 'PlaceController@deletePlace')->name('deleteplace');
    Route::post('appoveplace', 'PlaceController@appovePlace')->name('appoveplace');
    Route::resource('reports', 'ReportController');
    Route::post('approve', 'ReportController@approve')->name('approve');
});
Route::group(['prefix' => 'member'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('reviews', 'ReviewController');
    Route::resource('collection', 'CollectionController');
    Route::post('removereview', 'ReviewController@removeReview')->name('removeReview');
    Route::post('sendreport', 'ReportController@sendReport')->name('sendreport');
    Route::post('addplace', 'PlaceController@addPlace')->name('addplace');
    Route::post('likereviews', 'ReviewController@favorite');
    Route::post('deleteimage', 'ReviewController@remove')->name('remove');
    Route::post('comment', 'ReviewController@comment');
    Route::post('updatecomment', 'ReviewController@updateComment');
    Route::post('deletecomment', 'ReviewController@deleteComment');
    Route::get('reviews/{id}/collection', 'ReviewController@addToCollection')->name('savecollection');
    Route::get('reviews/{id}/save/{collection_id}', 'CollectionController@save')->name('savereview');
    Route::get('showplace/{id}', 'PlaceController@showPlace')->name('showplace');
    Route::get('editplace/{id}', 'PlaceController@editPlace')->name('editplace');
    Route::post('uploadplace/{id}', 'PlaceController@uploadPlace')->name('uploadplace');
    Route::get('topweek', 'PlaceController@topWeek')->name('topweek');
    Route::group(['prefix' => 'user'], function () {
        Route::get('edit/{id}', 'UserController@edit')->name('editprofile');
        Route::get('wall/{id}', 'UserController@myWall')->name('mywall');
        Route::get('collection/{id}', 'UserController@showCollection')->name('mycollection');
    });

});
Route::get('/get-places', 'SearchController@getPlaces');
Route::get('/get-dists', 'SearchController@getDists');
