<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DependenciasDirectorio extends Model
{
    use HasFactory;

    public function usuarios(){
        return $this->hasMany(MiembrosDirectorio::class, 'dependencia_id', 'id');
    }
}
