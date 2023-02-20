<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'descripcion', 'categoria']; //para que se rellenen los campos directamente desde el formulario request
}
