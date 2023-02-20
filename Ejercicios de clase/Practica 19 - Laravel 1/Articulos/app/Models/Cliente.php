<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $primaryKey="id";
    protected $fillable=['Nombre','Apellidos'];
    protected $hidden=['id'];

    public function articulo(){
        return $this->hasOne(Articulo::class);
    }
    public function articulos(){
        return $this->hasMany(Articulo::class);
    }
    public function perfils(){
        return $this->belongsToMany(Perfil::class);
    }
}
