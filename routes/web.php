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

Route::get('/', 'PagesController@index');

Route::get('/1gamedpain', 'AdminController@trans');

Route::get('/2gamedpain', 'AdminController@depart');

Route::get('/about', 'PagesController@about');

Route::get('/entrusts/create/{id}', 'EntrustsController@create');

Route::get('/departs/arrived/{id}', 'DepartsController@arrived');

Route::get('/departs/deleted/{id}', 'DepartsController@deleted');

Route::get('/departs/history', 'DepartsController@history');

Route::get('/transactions/deleted/{id}', 'TransactionsController@deleted');

Route::get('/transactions/history', 'TransactionsController@history');

Route::get('/users/detail/{id}', 'UsersController@detail');

Route::resource('transactions', 'TransactionsController');

Route::resource('departs', 'DepartsController');

Route::resource('entrusts', 'EntrustsController');

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

// Route::get('/profile', 'UsersController@index');
Route::get('/profile', 'UsersController@profile');
Route::post('/profile', 'UsersController@update_profile');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
