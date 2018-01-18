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
    @endcomponent
  @endforeach
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
    @if(strtolower($cat) == $categoria->slug)
      @slot('active')
        active
      @endslot
    @else
      @slot('active')
      @endslot
    @endif
  @endcomponent
@endforeach
@endsection
