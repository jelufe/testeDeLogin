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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::get('/Clientes', 'ClientesControler@index');
Route::get('/Clientes/novo', 'ClientesControler@novo');
Route::get('/Clientes/{cliente}/editar', 'ClientesControler@editar');
Route::post('/Clientes/salvar', 'ClientesControler@salvar');
Route::patch('/Clientes/{cliente}', 'ClientesControler@atualizar');
Route::delete('/Clientes/{cliente}', 'ClientesControler@deletar');

Auth::routes();
