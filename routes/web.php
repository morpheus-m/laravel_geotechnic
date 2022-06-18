<?php

use \Illuminate\Support\Facades\Route;


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
    return view('welcome');
});


// Admin Routes
Route::group(['prefix' => 'admin', 'namespace' => 'admin','middleware' => 'auth'], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard')->middleware('auth');

    // GeoTechnics Routes
    Route::group(['prefix' => 'geotechnics'], function () {
        Route::get('/create', 'GeoTechnicsController@create')->name('admin.geotechnics.create');
    });

});


Route::group(['prefix' => 'auth', 'namespace' => 'auth'], function () {

    Route::get('/register','RegisterController@registerForm')->name('auth.register.form');
    Route::get('/login', 'LoginController@loginForm')->name('auth.login.form');
    Route::post('/login','LoginController@login')->name('auth.login');
    Route::get('/send-code','LoginController@sendCode')->name('auth.send.code');
    Route::get('/logout','LoginController@logout')->name('auth.logout');

});























