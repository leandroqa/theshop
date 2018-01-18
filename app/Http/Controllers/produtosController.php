<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;

class produtosController extends Controller
{
    //
    public function index()
    {
      $categorias = categoriasController::getCategorias();
      return view('index')->with(['categorias'=> $categorias]);
    }


}
