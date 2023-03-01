<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Usuario extends Model implements Authenticatable
{
    use HasFactory;

    // Tabla asociada al modelo
    protected $table = 'usuarios';

    // Indica si el modelo utiliza timestamps
    public $timestamps = false;

    // Atributos que son asignables en masa
    protected $fillable = ['nombre_usuario', 'contrasena'];

    // Métodos requeridos por la interfaz Authenticatable

    /**
     * Devuelve el nombre del atributo que se utiliza como identificador
     * único del usuario en el sistema de autenticación.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        return 'id';
    }

    /**
     * Devuelve el identificador único del usuario en el sistema de
     * autenticación.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Devuelve la contraseña del usuario en el sistema de autenticación.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    /**
     * Devuelve el token de recuerdame del usuario.
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Establece el token de recuerdame del usuario.
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;

    }

    /**
     * Devuelve el nombre del atributo que se utiliza para almacenar el
     * token de recuerdame del usuario.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function esEditor($id) {
        $editor = Editor::where('usuario_id', $id)->first();
        return $editor ? true : false;
    }
}