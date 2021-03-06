<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;
use theshop\Produto;

class produtosController extends Controller
{
    //
    public function index()
    {
      $categorias = categoriasController::getCategorias();
      $produtos = Produto::all();
      return view('index')->with(['categorias'=> $categorias, 'produtos'=> $produtos]);
    }

    public function produtoInfo($produto_id)
    {
      $produto = Produto::where('id','=',$produto_id)->first();
      return view('produtoInfo')->with(['produto'=> $produto,'categorias'=> categoriasController::getCategorias()]);
    }

    public function buscarProdutos(Request $request)
    {
      //busca de produtos
      $prod = $request->input('buscarpor');
      $produtos = Produto::where("nome","like","%$prod%")->get();
      return view('index')->with(['produtos'=> $produtos, 'categorias' => categoriasController::getCategorias()]);
    }


    public function about()
    {
      return view('about');
    }


}
