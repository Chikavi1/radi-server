<?php

namespace Radi;

use Illuminate\Database\Eloquent\Model;

class ally extends Model
{
     protected $fillable = [
        'nombre','personal','imagen','horario','direccion','redes','telefono','promocion'
    ];
}
