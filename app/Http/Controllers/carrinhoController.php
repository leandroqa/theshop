<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;

class carrinhoController extends Controller
{
    //protected $carrinho = array();

    public function __construct()
    {
      //inicializa a seção do carrinho de compras
      //$this->carrinho = ['id'=>1, 'codigo_produto'=> 1, 'qtde' => 2];
      //$request->session()->put('carrinho', null);
    //session(['carrinho' => null]);
    session('carrinho', array());

    }

    public function showCarrinho()
    {
      return view('carrinho')->with(['carrinho' => $this->getCarrinho()]);
    }

    public function getCarrinho()
    {
      //retorna os produtos do carrinho de compras
      return session('carrinho');
    }

    public function adicionarCarrinho(Request $request)
    {
        //adicionar itens no carrinho de compras

        $compra = $request->all();

        //$request->session()->put('carrinho', $compra);
        $request->session()->push('carrinho', $compra);
        return redirect()->route('showCarrinho');
    }

    public function removerCarrinho($id)
    {
      //remover itens do carrinho de compras
    }



    public function finalizarCompra(Request $request)
    {
      //cadastra a compra na tabela pedido
      $request->session()->flush();
    }


}
