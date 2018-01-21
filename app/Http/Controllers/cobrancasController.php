<?php

namespace theshop\Http\Controllers;

use Illuminate\Http\Request;
use theshop\Cobranca;

class cobrancasController extends Controller
{

    public function index()
    {
      return view('cobranca');
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

      $cobranca = new Cobranca;
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
      $cobranca->save();

      return "Gravado";

    }

}
