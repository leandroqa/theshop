@extends('layouts.app')
@section('header1')
  <h1>Endereço de entrega</h1>
@endsection
@section('content')

@if(count($errors) >0)
  <div class="alert alert-danger">
      <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
  @endif

{{Form::open(['route' => 'gravarEndereco', 'method' => 'POST'])}}
{{Form::hidden('email',Auth::user()->email)}}

<br>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Telefone:<font color="red">*</font></span>
  <input type="number" name="telefone" id="telefone" class="form-control" placeholder="" aria-describedby="sizing-addon2" required value="{{old('telefone')}}" >
</div>
<br>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Celular:</span>
  <input type="number" name="celular" id="celular" class="form-control" placeholder="" aria-describedby="sizing-addon2" value="{{old('celular')}}">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">CEP:<font color="red">*</font></span>
  <input type="number" name="cep" id="cep" class="form-control" placeholder="" aria-describedby="sizing-addon2" required value="{{old('cep')}}">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Número:<font color="red">*</font></span>
  <input type="number" name="numero" id="numero" class="form-control" placeholder="Número" aria-describedby="sizing-addon2" required value="{{old('numero')}}">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Endereço:<font color="red">*</font></span>
  <input type="text" name="endereco" id="endereco" class="form-control" placeholder="" aria-describedby="sizing-addon2" required  value="{{old('endereco')}}">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Complemento:</span>
  <input type="text" name="complemento" id="complemento" class="form-control" placeholder="" aria-describedby="sizing-addon2"  value="{{old('complemento')}}">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Referência:</span>
  <input type="text" name="referencia" id="referencia" class="form-control" placeholder="" aria-describedby="sizing-addon2"  value="{{old('referencia')}}">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Bairro:<font color="red">*</font></span>
  <input type="text" name="bairro" id="bairro" class="form-control" placeholder="" aria-describedby="sizing-addon2" required  value="{{old('bairro')}}">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Cidade:<font color="red">*</font></span>
  <input type="text" name="cidade" id="cidade" class="form-control" placeholder="" aria-describedby="sizing-addon2" required  value="{{old('cidade')}}">
</div>
<br>
<div class="input-group">
  <span class="input-group-addon" id="sizing-addon2">Estado:<font color="red">*</font></span>
  <select name="estado" id="estado" class="form-control" required>
    <option></option>
    <option name="AC">Acre</option>
    <option name="AL">Alagoas</option>
    <option name="AP">Amapá</option>
    <option name="AM">Amazonas</option>
    <option name="BA">Bahia</option>
    <option name="CE">Ceará</option>
    <option name="DF">Distrito Federal</option>
    <option name="ES">Espírito Santo</option>
    <option name="GO">Goiás</option>
    <option name="MA">Maranhão</option>
    <option name="MT">Mato Grosso</option>
    <option name="MS">Mato Grosso do Sul</option>
    <option name="MG">Minas Gerais</option>
    <option name="PA">Pará</option>
    <option name="PB">Paraíba</option>
    <option name="PR">Paraná</option>
    <option name="PE">Pernambuco</option>
    <option name="PI">Piauí</option>
    <option name="RJ">Rio de Janeiro</option>
    <option name="RN">Rio Grande do Norte</option>
    <option name="RS">Rio Grande do Sul</option>
    <option name="RO">Rondônia</option>
    <option name="RR">Roraima</option>
    <option name="SC">Santa Catarina</option>
    <option name="SP">São Paulo</option>
    <option name="SE">Sergipe</option>
    <option name="TO">Tocantins</option>
</select>
</div>

<p>

</p>
<br>
<div class="">{{Form::submit('Cadastrar',['class'=>'btn btn-success'])}}</div>
{{Form::close()}}

@endsection
