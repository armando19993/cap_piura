<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificadoHabilidad extends Model
{
    use HasFactory;

    protected $casts = [
        'vigencia_fecha' => 'datetime:d/m/Y',
    ];

    public function getPdfAttribute( $value )
    {
        return "http://localhost:8000/pdf/".$value;
    }
}
