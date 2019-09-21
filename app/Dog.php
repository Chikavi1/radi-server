<?php

namespace Radi;

use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
   protected $fillable = [
        'nombre', 'especie', 'raza','color','imagen','sexo','senas','notas','status','qr_code','place','user_id','history'
    ];
    public function scopesearchQrCode($query,$code){
    	return $query->where('qr_code','LIKE',"%$code%")->get();
    }
     public function scopesearchNombre($query,$code){
    	return $query->where('nombre',"=","%$code%")->get();
    }

}
