@extends('layouts.app')
@section('header1')
  <h1>Carrinho de Compras</h1>
@endsection
@section('content')

@if(count($carrinho) > 0)
  <table class="table table-hover">
    <tr>
    <th>ID</th>
    <th>Produto</th>
    <th>Quantidade</th>
    <th>Preço Unitário</th>
    <th>Subtotal</th>
    <th></th>
  </tr>
  <?php $i =0;
  //print_r($carrinho);
   ?>
  @foreach($carrinho as $cart)
    <tr>
        <td>{{$cart['id']}}</td>
        <td>{{$cart['nome']}}</td>
        <td>
          <input type="number" name="qtde-{{++$i}}" id="qtde-{{$i}}" value="1" min="1" max="{{$cart['qtde']}}" class="quantidade" onclick="calculaTotal(this)">
        </td>
        <td id="preco-{{$i}}">R$ {{$cart['preco']}}</td>
        <td id="subtotal-{{$i}}">R$ {{$cart['preco']}}</td>
        {{Form::open(['route' => 'removerCarrinho', 'method' => 'DELETE'])}}
        {{Form::hidden('id',$cart['id'])}}
        <td>{{Form::submit('remover')}}</td>
        {{Form::close()}}
    </tr>
  @endforeach
</table>
<h3>Total a pagar: R$ <span id="total"></span></h3>
@else
  <p align="center">Seu carrinho ainda está vazio!</p>
@endif


<p align="center"><a class="btn btn-default" href="/" role="button">Voltar para loja</a></p>
@endsection


<script>

  function calculaTotal(qtde)
  {
    var id = qtde.id;
    var idx = id.split("-");
    var nome = "preco-"+ idx[1];
    var nome2 = "subtotal-"+ idx[1];
    var valor = document.getElementById(nome).innerHTML;
    var valorUnitario = valor.replace("R$ ","");
    var subtotal = document.getElementById(nome2);
    var novovalor = valorUnitario * qtde.value;
    subtotal.innerHTML = "R$ "+ novovalor;
  }

</script>
