@extends('layouts.app')
@section('header1')
  <h1>Seu Pedido</h1>
@endsection
@section('content')

@if(count($carrinho) > 0)
<div class="table-responsive">
  <table class="table table-hover carrinho">
    <tr>
    <th>Produto</th>
    <th>Quantidade</th>
    <th>Preço Unitário (R$)</th>
    <th>Subtotal (R$)</th>
    <th></th>
  </tr>
  <?php $total = 0;   ?>

  @foreach ($carrinho as $key => $cart)
    <tr>
        <td>{{$cart['nome']}}</td>
        <td>{{$cart['qtde']}}</td>
        <td>{{$cart['preco']}}</td>
        <td>{{$cart['totalUnitario']}}</td>
    </tr>
    <?php $total += $cart['totalUnitario'];?>
  @endforeach
</table>
</div>
<h3>Total: R$ {{$total}}</h3>
<p>
{{Form::open(['route' => 'finalizarPedido', 'method' => 'POST'])}}
{{Form::hidden('valorTotal',$total)}}
{{Form::submit('PAGAR',['class'=> 'btn btn-primary btn-lg'])}}
{{Form::close()}}
</p>
@else
  <p align="center">Seu carrinho ainda está vazio!</p>
  <br>
  <p align="center"><a class="btn btn-default" href="/" role="button">Voltar para loja</a></p>
@endif


@endsection
