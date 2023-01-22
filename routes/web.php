<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomeController@index')->name('home');
Route::get('/restaurants', 'RestaurantController@showRestaurants')->name('restaurants');
Route::get('/restaurant/create', 'RestaurantController@createRestaurantForm')->name('restaurant-form');
Route::get('/table/create', 'TableController@createTableForm')->name('table-form');
Route::get('/restaurant/{id}/tables', 'RestaurantController@showTables')->name('tables');
Route::get('/restaurant/{id}/active-tables', 'RestaurantController@showActiveTables')->name('active-tables');

Route::post('/restaurant/create', 'RestaurantController@requestCreateRestaurant')->name('create-restaurant');
Route::post('/table/create', 'TableController@requestCreateTable')->name('create-table');
