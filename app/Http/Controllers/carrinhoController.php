<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;

class carrinhoController extends Controller
{
    protected $carrinho = array();

    public function __construct()
    {
      //inicializa a seção do carrinho de compras
      $this->carrinho = ['id'=>1, 'codigo_produto'=> 1, 'qtde' => 2];
    }

    public function showCarrinho()
    {
      return view('carrinho')->with(['carrinho' => $this->getCarrinho()]);
    }

    public function getCarrinho()
    {
      //retorna os produtos do carrinho de compras
      return $this->carrinho;
    }

    public function adicionarCarrinho($compra)
    {
        //adicionar itens no carrinho de compras
    }

    public function removerCarrinho($id)
    {
      //remover itens do carrinho de compras
    }



    public function finalizarCompra()
    {
      //cadastra a compra na tabela pedido
    }


}
