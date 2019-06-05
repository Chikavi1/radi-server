<?php

namespace Radi;

use Illuminate\Database\Eloquent\Model;

class vaccination extends Model
{
	 
    protected $fillable = [
        'nombre', 'id_dog', 'fecha', 
    ];

     public function scopegetVaccinations($query,$id){
    	return $query->where('id_dog','LIKE',"%$id%")->get();
    }
}
