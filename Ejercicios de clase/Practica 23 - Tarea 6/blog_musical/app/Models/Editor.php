<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editor extends Model
{
    use HasFactory;
    protected $table = 'editores';
    public $timestamps = false;
    protected $fillable = ['usuario_id'];

}
