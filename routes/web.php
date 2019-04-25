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

Route::get('/', 'VeiculosController@index');
Route::get('/veiculos/create', 'VeiculosController@create');
Route::get('/veiculos/{id}/delete', 'VeiculosController@destroy');

Route::get('/marcas/{id}/cores', 'MarcasController@cores');