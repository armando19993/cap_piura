<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenNoticia extends Model
{
    use HasFactory;

    protected $hidden = ["created_at", "updated_at", "noticia_id", 'id'];
}
