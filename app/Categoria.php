<?php

namespace theshop;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $fillable = [
        'nome','foto','descricao',
    ];
}
