<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BolsaTrabajo extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha' => 'datetime:d/m/Y',
        ];
}
