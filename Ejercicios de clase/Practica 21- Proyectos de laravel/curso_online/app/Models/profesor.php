<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profesor extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['nombre_apellido','profesion','grado_academico','telefono'];
    protected $hidden=['id'];

    public function cursos(){
        return $this->hasMany(Curso::class);
    }
}
