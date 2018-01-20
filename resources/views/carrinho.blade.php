@extends('layouts.app')
@section('header1')
  <h1>Carrinho de Compras</h1>
@endsection
@section('content')

@if(count($carrinho) > 0)
<div class="table-responsive">
  <table class="table table-hover carrinho">
    <tr>
    <th>ID</th>
    <th>Produto</th>
    <th>Quantidade</th>
    <th>Preço Unitário (R$)</th>
    <th>Subtotal (R$)</th>
    <th></th>
  </tr>
  <?php $i =0; $total = 0;
  //print_r($carrinho);
   ?>

  @foreach ($carrinho as $key => $cart)
    <tr>
        <td>{{$cart['id']}}</td>
        <td>{{$cart['nome']}}</td>
        <td>
          <input type="number" name="qtde-{{++$i}}" id="qtde-{{$i}}" value="{{$cart['qtde']}}" min="1" max="{{$cart['estoque']}}" class="quantidade" onclick="calculaTotal(this)">
          <input type="hidden" name="key-{{$i}}" id="key-{{$i}}" value="{{$key}}">
        </td>
        <td id="preco-{{$i}}">{{$cart['preco']}}</td>
        <td id="subtotal-{{$i}}">{{$cart['totalUnitario']}}</td>
        {{Form::open(['route' => 'removerCarrinho', 'method' => 'DELETE'])}}
        {{Form::hidden('id',$cart['id'])}}
        <td>{{Form::submit('remover')}}</td>
        {{Form::close()}}
    </tr>
    <?php $total += $cart['totalUnitario'];?>
  @endforeach
</table>
</div>
<h3>Total a pagar: R$ <span id="total">{{$total}}</span></h3>
  {{Form::open(['route' => 'finalizarCompra', 'method' => 'POST'])}}
  {{Form::hidden('valorTotal',0)}}
  {{Form::submit('Ir para Pagamento',['class'=> 'btn btn-success'])}}
  {{Form::close()}}


@else
  <p align="center">Seu carrinho ainda está vazio!</p>
@endif

<br>
<p align="center"><a class="btn btn-default" href="/" role="button">Voltar para loja</a></p>
@endsection


<script>

  function calculaTotal(qtde)
  {
    var id = qtde.id;
    var idx = id.split("-");
    idx = idx[1];
    var nome = "preco-"+ idx;
    var nome2 = "subtotal-"+ idx;
    var valorUnitario = document.getElementById(nome).innerHTML;
    var subtotal = document.getElementById(nome2);
    var novovalor = valorUnitario * qtde.value;
    subtotal.innerHTML = novovalor;
    atualizarCarrinho(qtde,idx);
    reloadCarrinho();
  }


  function atualizarCarrinho(qtde,idx)
  {
      var key = document.getElementById("key-"+idx).value;
      var qx = qtde.value;
      var totalx = document.getElementById("subtotal-"+idx).innerHTML;
      $.ajax({
           url:"/carrinho/atualizar",
           type:'GET',
           data:{id:key,qtde:qx,totalUnitario:totalx},
           success:function(data){
             document.getElementById('total').innerHTML = data;
           },
           error: function (data) {
               alert('Error'+ data);
           }
       });
  }

  function reloadCarrinho()
  {
      location.reload();
  }



</script>
