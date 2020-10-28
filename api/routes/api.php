<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::namespace('App\Http\Controllers\Api')->name('api.')->group(function(){
	Route::prefix('/clientes')->group(function(){
		
		Route::get('/','ClientesController@index')->name('list_clientes');
		Route::post('/','ClientesController@store')->name('new_cliente');

		Route::get('/{ClienteId}','ClientesController@show')->name('single_cliente');
		Route::put('/{ClienteId}','ClientesController@update')->name('update_cliente');
		Route::delete('/{ClienteId}','ClientesController@delete')->name('delete_cliente');


		Route::get('/{ClienteId}/endereco','EnderecoController@index')->name('list_enderecos');
		Route::post('/{ClienteId}/endereco','EnderecoController@store')->name('new_endereco');

		Route::get('/{ClienteId}/endereco/{id}','EnderecoController@show')->name('single_endereco');
		Route::put('/{ClienteId}/endereco/{id}','EnderecoController@update')->name('update_endereco');
		Route::delete('/{ClienteId}/endereco/{id}','EnderecoController@delete')->name('delete_endereco');

	});
});