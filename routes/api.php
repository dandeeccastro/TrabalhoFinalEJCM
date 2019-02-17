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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('clientes', 'ClienteController');
Route::apiResource('vendedor', 'VendedorController');
Route::apiResource('jogos', 'JogosController');
Route::apiResource('categoria', 'CategoriaController');



Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');

Route::group(['middleware' => 'auth:api'], function() {
  Route::get('logout', 'API\PassportController@logout');
  Route::post('get-details', 'API\PassportController@getDetails');
  
  Route::post('createjogos','JogosController@store');
  Route::get('showjogos','JogosController@index');

  //Rotas em relação a middleware do Vendedor//

  Route::group(['middleware' => 'vendedorMiddleware'], function($router){

    // O que o vendedor pode alterar nos jogos //

    Route::put('updatejogos/{id}','JogosController@update');
    Route::delete('deletejogos/{id}', 'JogosController@destroy');
    //Route::post('createJogos','JogosController@store');
    //Route::get('showJogos','JogosController@index');

  
  });


});

Route::get('getJogos/{id}', 'VendedorController@getJogos');