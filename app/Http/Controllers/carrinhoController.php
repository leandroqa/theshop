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
      $total = $request->input('valorTotal');
      return "Finalizar compra $total";
      //$request->session()->flush();
      //return redirect()->route('showCarrinho');
    }

    public function atualizarCarrinho(Request $request)
    {
      //Atualiza qtde de itens do carrinho de compras
      $key = $request->input('id');
      $qtde = $request->input('qtde');
      if($key != null)
      {
        $arr = $this->getCarrinho();
        $arr[$key]['qtde'] = $qtde;
        $request->session()->flush();
        foreach($arr as $compra)
        {
          $request->session()->push('carrinho', $compra);
        }
        return 1;
      }
      else
      {
        return redirect()->route('showCarrinho');
      }
    }


}
