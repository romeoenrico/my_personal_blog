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

Route::get('/', 'FrontendController@getIndex');
Route::get('articolo/{slug}', 'FrontendController@getArticolo');
Route::get('autore/{slug}', 'FrontendController@getAutore');
Route::get('categoria/{slug}', 'FrontendController@getCategoria');

Route::get('dashboard', 'Backend\MainController@getIndex');
Route::get('login', 'Backend\MainController@getLogin');
Route::post('postlogin', 'Backend\MainController@postLogin');
Route::get('getlogout', 'Backend\MainController@getLogout');