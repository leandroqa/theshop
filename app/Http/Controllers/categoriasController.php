<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;
use theshop\Categoria;
use theshop\Produto;

class categoriasController extends Controller
{

    public static function getCategorias()
    {
      $categorias = Categoria::where('status', 1)
               ->orderBy('nome', 'desc')
               ->get();
      return $categorias;
    }

    public function showCategoria($categoria)
    {
      $produtos = ""; //id e image
      $categorias = self::getCategorias();
      return view('categoriaprod')->with(['categorias'=>$categorias, 'cat'=> ucfirst($categoria), 'produtos'=> $produtos]);
    }

}
