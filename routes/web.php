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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/','produtosController@index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/produto/','produtosController@index');

Route::get('/produto/{prod}','produtosController@produtoInfo');

Route::get('/carrinho','carrinhoController@showCarrinho');

Route::get('/{cat}','categoriasController@showCategoria');
