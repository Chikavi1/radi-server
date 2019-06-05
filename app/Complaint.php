<?php

namespace Radi;

use Illuminate\Database\Eloquent\Model;

class complaint extends Model
{
    protected $fillable = [
        'nombre', 'telefono', 'description','status'
    ];
}