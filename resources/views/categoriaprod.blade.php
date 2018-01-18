@extends('layouts.app')
@section('header1')
  <h1>{{$cat}}</h1>
@endsection
@section('search')
  @component('components.search')
  @endcomponent
@endsection

@section('produtoszone')
  @for($i= 0; $i < 12; $i++)
    @component('components.produtoszone')
        @slot('nomeProduto')
          MacbookPro
        @endslot
        @slot('descricaoProduto')
          A touch of genius
        @endslot
    @endcomponent
  @endfor
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
    @if($cat == $categoria->slug)
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
