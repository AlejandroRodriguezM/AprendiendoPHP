<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=["Nombre_Articulo","Precio","Pais_Origen","Observaciones","seccion"];
    protected $dates=['deleted_at'];

    public function cliente(){
        return $this->belongsTo(Cliente::class,"cliente_id");
    }
}
