<?php

namespace Radi;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
     protected $fillable = [
        'titulo', 'descripcion', 'fecha','imagen'
    ];
}
