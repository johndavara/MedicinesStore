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
Route::get('/product/{id}/{criteria}/show','ProductController@show');
Route::post('/product/store','ProductController@store');
Route::put('/product/update','ProductController@update');
Route::put('/product/activate','ProductController@activate');
Route::put('/product/desactivate','ProductController@desactivate');


Route::get('/shoppingCart','ShoppingCartController@index');
Route::post('/shoppingCart/addToCheckout','ShoppingCartController@addToCheckout');
Route::get('/shoppingCart/checkout','ShoppingCartController@checkout');
Route::get('/shoppingCart/checkoutData','ShoppingCartController@checkoutData');
Route::put('/shoppingCart/deleteItemCheckout','ShoppingCartController@deleteItemCheckout');
Route::put('/shoppingCart/destroy','ShoppingCartController@destroy');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/search', 'SearchController@search');
Route::get('/directSearch/{id}/directSearch','SearchController@directSearch');