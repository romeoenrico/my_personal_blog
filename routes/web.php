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

Route::get('dashboard', 'Backend\SessionsController@getIndex');

//Auth::routes();

Route::get('register', 'Backend\RegistrationController@create');
Route::post('register', 'Backend\RegistrationController@store');
Route::get('login', 'Backend\SessionsController@create')->name('home');
Route::post('login', 'Backend\SessionsController@store');
Route::post('logout', 'Backend\SessionsController@destroy');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('backend/indexuser', 'Backend\UserController@getIndex');
Route::get('backend/adduser', 'Backend\UserController@getAdd');
Route::post('backend/adduser', 'Backend\UserController@store');
Route::post('backend/adduser', 'Backend\UserController@store');
Route::get('backend/indexuser/delete/{id}', 'Backend\UserController@getDelete');

Route::get('backend/indexcategory', 'Backend\CategoryController@getIndex');
Route::get('backend/addcategory', 'Backend\CategoryController@getAdd');
Route::post('backend/addcategory', 'Backend\CategoryController@postAdd');
Route::get('backend/editcategory', 'Backend\CategoryController@getEdit');
Route::post('backend/indexcategory/delete/{id}', 'Backend\CategoryController@postEdit');
Route::get('backend/indexcategory/delete/{id}', 'Backend\CategoryController@getDelete');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');