<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use theshop\Pedido;
use theshop\Produtosxpedido;


class pedidosController extends Controller
{
    public function index()
    {
      return view('pedidos');
    }

    public function finalizarPedido(Request $request)
    {
      //gravar pedido no banco de dados
      DB::beginTransaction();
      try
      {
        //Pedidos
        $pedidos = new Pedido();
        $pedidos->email = Auth::user()->email;
        $pedidos->total = $request->input('valorTotal');
        $pedidos->save();
        //Produtosxpedidos
        $carrinho = session('carrinho');
        foreach($carrinho as $cart)
        {
            $produto = new Produtosxpedido();
            $produto->produtos_id = $cart['id'];
            $produto->email = Auth::user()->email;
            $produto->qtde = $cart['qtde'];
            $produto->valorUnitario = $cart['preco'];
            $produto->save();
            $produto = null;
        }
        DB::commit();
        $request->session()->forget('carrinho');
      }
      catch(\Exception $e)
      {
          DB::rollback();
          return view('mensagem')->with(['status'=> 0]);
      }
      return view('mensagem')->with(['status'=> 1]);

    }

    public function getPedidos($email)
    {
      //lista de pedidos por usuário
    }


}
