<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Curso extends Model
{
    use HasFactory;
    protected $guarded = []; //para que se rellenen los campos directamente desde el formulario request
    public function getRouteKeyName()
    {
        return "slug";
    }

    protected static function boot()
    {
        parent::boot();

        // Definimos el evento saving
        static::saving(function ($curso) {
            // Generamos un slug a partir del nombre del curso
            $slug = Str::slug($curso->name);
            // Buscamos si ya existe un curso con ese mismo slug o si hay otros cursos que generan el mismo slug
            $existingCurso = Curso::where('slug', $slug)
                ->orWhere(function ($query) use ($slug) {
                    $query->where('slug', 'like', $slug . '-%');
                })
                ->where('id', '<>', $curso->id ?? 0)
                ->get();
            // Si existe, agregamos un sufijo numérico al slug para evitar duplicados
            $i = 2;
            while ($existingCurso->contains('slug', $newSlug = $slug . '-' . $i)) {
                $i++;
            }
            // Asignamos el slug generado al campo correspondiente
            $curso->slug = $existingCurso->isEmpty() ? $slug : $newSlug;
        });
    }
}
