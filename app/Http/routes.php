<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome',['content'=>'Laravel 5']);
});

Route::get('/admin/', function () {
    return view('admin.main');
});


Route::get('/photo/', 'PhotoController@index');
