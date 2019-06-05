<?php

namespace Radi;

use Illuminate\Database\Eloquent\Model;

class resquest extends Model
{
      protected $fillable = [
        'nombre', 'telefono', 'vivienda','dormira','adoptado_anterior','acuerdo','medidas','status'
    ];

}
