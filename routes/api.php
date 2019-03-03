<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function() {
  return 'ciao sono api';
});


Route::get('/products', 'Api\ProductController@index');
Route::post('/products', 'Api\ProductController@create');
Route::get('/products/{id}', 'Api\ProductController@show');
//sarebbe put
Route::post('/products/{id}', 'Api\ProductController@update');
