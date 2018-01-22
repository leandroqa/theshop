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

Route::get('/sobre','produtosController@about')->name('about');

Route::get('/produto/','produtosController@index');

Route::get('/produto/{prod}','produtosController@produtoInfo');

Route::post('/carrinho/add','carrinhoController@adicionarCarrinho')->name('adicionarCarrinho');

Route::get('/carrinho','carrinhoController@showCarrinho')->name('showCarrinho');



Route::post('/carrinho/add','carrinhoController@adicionarCarrinho')->name('adicionarCarrinho');

Route::delete('/carrinho/remover','carrinhoController@removerCarrinho')->name('removerCarrinho');


Route::get('/carrinho/atualizar','carrinhoController@atualizarCarrinho')->name('atualizarCarrinho');

Route::post('/buscar','produtosController@buscarProdutos')->name('buscarProdutos');

Route::get('/pedidos/','pedidosController@getPedidos')->middleware('auth');

Route::post('/pedidos/finalizar','pedidosController@finalizarPedido')->name('finalizarPedido')->middleware('auth');

Route::get('/pedidos/{ped}','pedidosController@getPedidosInfo')->middleware('auth');


Route::get('/cobranca','cobrancasController@index')->middleware('auth')->name('finalizarCompra');

Route::post('/cobranca/gravar','cobrancasController@gravar')->middleware('auth')->name('gravarEndereco');

//Route::get('/')

Route::get('/{cat}','categoriasController@showCategoria');
