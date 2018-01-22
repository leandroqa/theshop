@extends('layouts.app')
@section('header1')
  <h1>Pedidos</h1>
@endsection
@section('content')


@if(count($pedidos)> 0)
  <table class="table table-hover carrinho">
    <tr>
    <th></th>
    <th>Pedido</th>
    <th>Data</th>
    <th>Hora</th>
    <th>Total Pago</th>
  </tr>
  @foreach($pedidos as $key=>$pedido)
  <?php
        $data = explode(" ",$pedido->created_at);
        $hora = explode(":", $data[1]);
        $hora = $hora[0] . ":" . $hora[1];
        $data = explode("-", $data[0]);
        $data = $data[2]."/".$data[1]."/".$data[0];

   ?>
      <tr>
        <td><a href="/pedidos/{{$pedido->id}}"><span class="glyphicon glyphicon-search"></span></a></td>
        <td><a href="/pedidos/{{$pedido->id}}">{{$pedido->id}}</a></td>
        <td>{{$data}}</td>
        <td>{{$hora}}</td>
        <td>{{$pedido->total}}</td>
      </tr>
  @endforeach
  </table>
@else
  <p align="center">Nenhum pedido encontrado.</p>
@endif
@endsection
