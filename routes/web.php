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



Route::get('/c', function () {
    return view('layouts.create');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('layouts.master');
    });

    Route::resource('inwards','InwardsController');

    Route::resource('outwards','OutwardsController');

    Route::patch('/inwards/{inward}/reel', 'InwardsController@reels_update')->name('inwards.reel');
});


