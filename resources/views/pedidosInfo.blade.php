@extends('layouts.app')
@section('header1')
<h1>Pedido: {{$id}}</h1>
@endsection

@section('content')
<div class="table-responsive">
  <table class="table table-hover carrinho">
    <tr>
    <th>Produto</th>
    <th>Quantidade</th>
    <th>Preço Unitário (R$)</th>
</tr>
@foreach($pedidos as $key=>$pedido)
    <tr>
      <td>{{$pedido->nome}}</td>
      <td>{{$pedido->qtde}}</td>
      <td>{{$pedido->valorUnitario}}</td>
    </tr>
@endforeach
</table>
</div>
<p>Total: <b>R$ {{$pedido->total}}</b></p>

<p align="center"><a href="/pedidos" class="btn btn-default">Voltar</a></p>


@endsection
