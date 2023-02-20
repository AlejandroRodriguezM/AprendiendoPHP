<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['nombre','nivel','horas_academicas','profesor_id'];
    protected $hidden=['id'];

    public function profesor(){
        return $this->belongsTo(Profesor::class);
    }

    public function alumnos(){
        return $this->belongsToMany(Alumno::class);
    }
}
