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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category','CategoryController@index');
Route::post('/category/store','CategoryController@store');
Route::put('/category/update','CategoryController@update');
Route::put('/category/activate','CategoryController@activate');
Route::put('/category/desactivate','CategoryController@desactivate');



Route::get('/product','ProductController@index');
Route::post('/product/store','ProductController@store');
Route::put('/product/update','ProductController@update');
Route::put('/product/activate','ProductController@activate');
Route::put('/product/desactivate','ProductController@desactivate');


Route::get('/shoppingCart','ShoppingCartController@index');
Route::post('/shoppingCart/store','ShoppingCartController@store');
Route::put('/shoppingCart/destroy','ShoppingCartController@destroy');