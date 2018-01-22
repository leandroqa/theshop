@extends('layouts.app')
@section('header1')
  <h1>Pedidos</h1>
@endsection
@section('content')

@foreach($pedidos as $key=>$pedido)
  <h2>{{$pedido->id}}</h2>{{$pedido->created_at}}
  <table class="table table-hover carrinho">
    <tr>
    <th>Produto</th>
    <th>Quantidade</th>
    <th>Preço Unitário (R$)</th>
  </tr>
  <div class="table-responsive">
    <tr>
      <td>{{$pedido->nome}}</td>
      <td>{{$pedido->qtde}}</td>
      <td>{{$pedido->valorUnitario}}</td>
    </tr>
  </table>
  <p>Total: {{$pedido->total}}</p>
@endforeach

@endsection
