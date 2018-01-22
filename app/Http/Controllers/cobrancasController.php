<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;
use theshop\Cobranca;
use Illuminate\Support\Facades\Auth;

class cobrancasController extends Controller
{

    public function index()
    {
      $cobranca = Cobranca::where('email',"=",Auth::user()->email)->first();
      return view('cobranca')->withCobranca($cobranca);
    }

    public function gravar(Request $request)
    {
      $this->validate($request, [
      'telefone' => 'required',
      'cep' => 'required|numeric',
      'numero' => 'required|numeric',
      'endereco' => 'required',
      'bairro' => 'required',
      'cidade' => 'required',
      'estado' => 'required',
      ]);

      if (count(Cobranca::where('email',"=",Auth::user()->email)->get())> 0)
      {
        $idcobranca = Cobranca::where('email',"=",Auth::user()->email)->first();

        $cobranca = Cobranca::find($idcobranca->id);
      }
      else
      {
          $cobranca = new Cobranca;
      }

      $cobranca->email = $request->input('email');
      $cobranca->telefone = $request->input('telefone');
      $cobranca->celular = $request->input('celular');
      $cobranca->cep = $request->input('cep');
      $cobranca->numero = $request->input('numero');
      $cobranca->endereco = $request->input('endereco');
      $cobranca->complemento = $request->input('complemento');
      $cobranca->referencia = $request->input('referencia');
      $cobranca->bairro = $request->input('bairro');
      $cobranca->cidade = $request->input('cidade');
      $cobranca->estado = $request->input('estado');
      $id = $cobranca->save();
      
      return view('finalizarPedido')->with(['carrinho'=> session('carrinho')]);

    }

}
