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
App::singleton('App\Repository\TreeRepositoryInterface','App\Repository\TreeRepository');
//App::bind('App\Repository\TreeRepositoryInterface','App\Repository\TreeRepository');
Route::bind('id','App\Repository\TreeRepositoryInterface');

Route::get('/admin/gettree/{adminmodel}/{id?}', 'AdminController@listtree');

//Route::controller('/admin/gettree/{id?}', 'AdminController');

Route::get('/admin/getnodes/{id}', 'AdminController@listnode');

Route::get('/admin/getcurrentnode/{id}', 'AdminController@getnode');

