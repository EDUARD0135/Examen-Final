<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    use HasFactory;

    protected $fillable = ['usuario_id', 'producto_id'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

// Soy Kelen
