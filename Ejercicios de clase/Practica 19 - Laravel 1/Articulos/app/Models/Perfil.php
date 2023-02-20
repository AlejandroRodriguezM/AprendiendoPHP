<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;
    protected $fillable=["Nombre"];

    public function clientes(){
        return $this->belongsToMany(Cliente::class);
    }
}
