<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;

class carrinhoController extends Controller
{
    public function __construct()
    {
      //inicializa a seção do carrinho de compras
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
        $request->session()->push('carrinho', $compra);
        return redirect()->route('showCarrinho');
    }

    public function removerCarrinho(Request $request)
    {
      //remover itens do carrinho de compras
      $arr = $this->getCarrinho();
      $key = array_search($request->input('id'), array_column($arr, 'id'));
      unset($arr[$key]);
      $request->session()->flush();
      foreach($arr as $compra)
      {
        $request->session()->push('carrinho', $compra);
      }
      return redirect()->route('showCarrinho');
    }

    public function finalizarCompra(Request $request)
    {
      //cadastra a compra na tabela pedido
      //$total = $request->input('valorTotal');
      $carrinho = $this->getCarrinho();
      return $carrinho;
      /*$request->session()->forget('carrinho');
      $request->session()->flush();
      return "finished";*/
      //return redirect()->route('showCarrinho');
    }

    public function atualizarCarrinho(Request $request)
    {
      //Atualiza qtde de itens e total unitário
      $key = $request->input('id');
      $qtde = $request->input('qtde');
      $subtotal = $request->input('totalUnitario');
      $valorTotal = 0;
      if($key != null)
      {
        $arr = $this->getCarrinho();
        $arr[$key]['qtde'] = $qtde;
        $arr[$key]['totalUnitario'] = $subtotal;
        $request->session()->flush();
        foreach($arr as $compra)
        {
          $request->session()->push('carrinho', $compra);
          $valorTotal += $compra['totalUnitario'];
        }
        return $valorTotal;
      }
      else
      {
        return redirect()->route('showCarrinho');
      }
    }


}
