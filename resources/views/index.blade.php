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
@for($i= 0; $i < 6; $i++)
  @component('components.menu')
    @slot('categoria')
        categoria {{$i}}
    @endslot
    @slot('url')
      /categoria/categoria{{$i}}
    @endslot
    @if($i == 2)
      @slot('active')
        active
      @endslot
    @else
      @slot('active')

      @endslot
    @endif
@endcomponent
@endfor
@endsection
