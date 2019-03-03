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
//ho creato un gruppo di rotte e passato un unico namespace cosi da non ripetere Api
//aggiunto il mio middleware 
Route::middleware('apiAutenticazione')->namespace('Api')->group(function() {

  Route::get('/products', 'ProductController@index');
  Route::post('/products', 'ProductController@create');
  Route::get('/products/{id}', 'ProductController@show');
  //sarebbe put
  Route::post('/products/{id}', 'ProductController@update');
  Route::delete('/products/{id}/delete', 'ProductController@delete');

});
