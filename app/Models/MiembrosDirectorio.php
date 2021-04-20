<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MiembrosDirectorio extends Model
{
    use HasFactory;

    public function dependencia(){
      return $this->hasOne(DependenciasDirectorio::class, 'id', 'dependencia_id');
    }
}
