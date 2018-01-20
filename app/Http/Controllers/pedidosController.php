<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;

class pedidosController extends Controller
{
    public function index()
    {
      return view('pedidos');
    }
}
