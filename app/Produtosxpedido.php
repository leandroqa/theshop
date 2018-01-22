<?php

namespace theshop;

use Illuminate\Database\Eloquent\Model;

class Produtosxpedido extends Model
{

  protected $fillable = [
      'produtos_id','email','qtde', 'valorUnitario',
  ];
}
