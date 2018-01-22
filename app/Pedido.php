<?php

namespace theshop;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
  protected $fillable = [
      'email','total',
  ];
}
