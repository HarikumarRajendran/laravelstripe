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

Route::get('/', ['as' => 'get-index','uses' => 'HomeController@getIndex']);

Route::post('/product-details', ['as' => 'post-product-details','uses' => 'HomeController@postProductDetails']);

Route::post('/make-payment', ['as' => 'post-make-payment','uses' => 'HomeController@postMakePayment']);