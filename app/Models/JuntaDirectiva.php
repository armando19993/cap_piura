<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JuntaDirectiva extends Model
{
    use HasFactory;

    public function categoria(){
      return $this->hasOne(CategoriaJuntaDirectiva::class, 'id', 'categoria_id');
    }

    public function getFotoAttribute($value){
        return "http://localhost:8000/uploads/fotos/".$value;
    }

    public function getHojaVidaAttribute($value){
        return "http://localhost:8000/uploads/hojas_vida/".$value;
    }
}
