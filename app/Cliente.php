<?php

namespace theshop;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $fillable = [
        'nome','sobrenome','email', 'cpf','aniversario','sexo',
    ];
}
