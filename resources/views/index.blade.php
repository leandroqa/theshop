@extends('layouts.app')

@section('header1')
@component('components.header1')
      @slot('titulo')
        Novo produto aqui
      @endslot
      @slot('texto')
        <p>Mussum Ipsum, cacilds vidis litro abertis.</p>
      @endslot
@endcomponent
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
  @include('menuCategorias', ['categorias' => $categorias, 'cat' => null])
@endsection
