<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'MainController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('/photo', 'PhotoController');

    Route::group(['prefix' => 'photo'], function () {

    });
});

Route::get('/previous', 'HomeController@PreviousPhoto');
Route::get('/next', 'HomeController@NextPhoto');