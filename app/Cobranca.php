<?php

namespace theshop;

use Illuminate\Database\Eloquent\Model;

class Cobranca extends Model
{
    //
    protected $fillable = [
        'email','telefone','celular', 'cep','numero','endereco','complemento','referencia',
        'bairro','cidade','estado',
    ];
}
