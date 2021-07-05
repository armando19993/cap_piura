<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    use HasFactory;

    public function categoria(){
      return $this->hasOne(CategoriaNoticia::class, 'id', 'categoria_id');
    }

    public function imagenes(){
      return $this->hasMany(ImagenNoticia::class, 'noticia_id', 'id');
    }

    protected $casts = [
      'fecha' => 'datetime:d/m/Y',
    ];
}
