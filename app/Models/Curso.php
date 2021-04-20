<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    public function categoria(){
        return $this->hasOne(CategoriasCurso::class, 'id', 'categoria_id');
    }

    public function cupos()
    {
        return $this->hasMany(RelacionCurso::class, 'id_curso', 'id');
    }
    
    
    public function getWhatsappAttribute( $value )
    {
        return "https://api.whatsapp.com/send?phone=51".$value;
    }
    

     protected $casts = [
         'fecha_inicio' => 'datetime:d/m/Y',
     ];
}
