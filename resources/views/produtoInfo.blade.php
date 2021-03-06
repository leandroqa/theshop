@extends('layouts.app')

@section('content')
<h1>{{$produto->nome}}</h1>
<div class="col-xs-7">
<div class="thumbnail">
  <img src="/uploads/{{$produto->fotoDestacada}}" alt="">
</div>

<p>Descrição: <br>{{$produto->caracteristicas}}</p>
<p>Quantidade: {{$produto->qtde}}</p>
<p><b>R$ {{$produto->preco}}</b></p>
{{Form::open(['route' => 'adicionarCarrinho', 'method' => 'POST'])}}
{{Form::hidden('id',$produto->id)}}
{{Form::hidden('nome',$produto->nome)}}
{{Form::hidden('caracteristicas',$produto->caracteristicas)}}
{{Form::hidden('qtde',1)}}
{{Form::hidden('estoque',$produto->qtde)}}
{{Form::hidden('preco',$produto->preco)}}
{{Form::hidden('totalUnitario',$produto->preco)}}

<p>{{Form::submit('Adicionar ao carrinho')}}</p>
{{Form::close()}}
</div>

@endsection

@section('categoriaszone')
<h2>Categorias</h2>

@foreach($categorias as $categoria)
  @component('components.menu')
    @slot('categoria')
        {{$categoria->nome}}
    @endslot
    @slot('url')
      /{{$categoria->slug}}
    @endslot
    @slot('active')
    @endslot
  @endcomponent
@endforeach
@endsection
