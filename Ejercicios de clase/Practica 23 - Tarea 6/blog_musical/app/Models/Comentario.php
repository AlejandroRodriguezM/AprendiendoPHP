<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;

    protected $table = 'comentarios';

    protected $fillable = [
        'id',
        'nombre',
        'comentario',
        'estado',
        'articulos_id',
    ];

    public function comentario()
    {
        return $this->belongsTo(Categoria::class);
    }
}
