<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;
use theshop\Categoria;
use theshop\Produto;
use Illuminate\Support\Facades\DB;

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
      $produtos = DB::table('produtos')
            ->join('produtosxcategorias', 'produtosxcategorias.produtos_id', '=', 'produtos.id')
            ->join('categorias', 'categorias.id', '=', 'produtosxcategorias.categorias_id')
            ->select('produtos.nome', 'produtos.caracteristicas', 'produtos.qtde', 'produtos.preco', 'produtos.fotoDestacada','categorias.nome as categoria','categorias.slug')
            ->where('categorias.slug', '=', $categoria)
            ->get();

      $categorias = self::getCategorias();
      return view('categoriaprod')->with(['categorias'=>$categorias, 'cat'=> ucfirst($categoria), 'produtos'=> $produtos]);
    }

}
