<?php

namespace Radi;

use Illuminate\Database\Eloquent\Model;

class deworming extends Model
{

	protected $fillable = [
        'nombre', 'id_dog', 'fecha',
    ];

    public function scopegetDewormings($query,$id){
    	return $query->where('id_dog','LIKE',"%$id%")->get();
    }
}
