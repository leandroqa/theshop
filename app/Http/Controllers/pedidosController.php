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
        $pedidos_id = $pedidos->getKey();
        //Produtosxpedidos
        $carrinho = session('carrinho');
        foreach($carrinho as $cart)
        {
            $produto = new Produtosxpedido();
            $produto->produtos_id = $cart['id'];
            $produto->pedidos_id = $pedidos_id;
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

    public function getPedidos()
    {
      $pedidos = Pedido::where('email',"=",Auth::user()->email)->get();
      return view('pedidos')->with(['pedidos'=> $pedidos]);
    }

    public function getPedidosInfo($id_pedido)
    {
      $pedidos = DB::table('produtosxpedidos')
            ->join('pedidos', 'produtosxpedidos.pedidos_id', '=', 'pedidos.id')
            ->join('produtos', 'produtos.id', '=', 'produtosxpedidos.produtos_id')
            ->select('pedidos.id','pedidos.created_at','produtos.nome', 'produtos.caracteristicas','produtosxpedidos.qtde','produtosxpedidos.valorUnitario','pedidos.total','pedidos.email')
            ->where('pedidos.id', '=', $id_pedido)
            ->get();
      return view('pedidosInfo')->with(['pedidos'=> $pedidos, 'id' => $id_pedido]);
    }

}
