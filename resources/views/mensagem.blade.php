@extends('layouts.app')
@section('header1')

  @if($status == 1)
  <div class="alert alert-success" role="alert">
    <h1>Obrigado por sua compra!</h1>
</div>
  @else
    <div class="alert alert-danger" role="alert">
    <h1>Um erro aconteceu, sua compra foi cancelada.</h1>
  </div>
  @endif
  <p align="center"><a class="btn btn-default" href="/" role="button">Voltar para loja</a></p>
@endsection
@section('content')

@endsection
