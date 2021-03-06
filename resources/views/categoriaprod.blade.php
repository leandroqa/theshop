@extends('layouts.app')
@section('header1')
  <h1>{{$cat}}</h1>
@endsection
@section('search')
  @component('components.search')
  @endcomponent
@endsection

@section('produtoszone')
  @foreach($produtos as $produto)
    @component('components.produtoszone')
        @slot('nomeProduto')
          {{$produto->nome}}
        @endslot
        @slot('descricaoProduto')
          {{$produto->caracteristicas}}
        @endslot
        @slot('imagem')
          {{$produto->fotoDestacada}}
        @endslot
        @slot('produto_id')
          {{$produto->id}}
        @endslot
    @endcomponent
  @endforeach
@endsection

@section('categoriaszone')
  <h2>Categorias</h2>
  @include('menuCategorias', ['categorias' => $categorias, 'cat' => $cat])
@endsection
