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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/site/index', function () {
    return view('welcome');
});

Route::get('/home', 'SiteController@home');  //google sign in

Route::get('/homea', 'SiteController@homea');



Route::get('/home1', 'SiteController@home1'); // google sign in for server side apps

Route::get('/home2', 'SiteController@home2');

Route::get('/home3', 'SiteController@home3');