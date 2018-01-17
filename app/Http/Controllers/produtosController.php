<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class produtosController extends Controller
{
    //
    public function index()
    {
      return view('index');
    }

    public function showCategoria($categoria)
    {
      return view('index');
    }
}
