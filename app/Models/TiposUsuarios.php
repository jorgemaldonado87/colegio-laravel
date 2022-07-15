<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposUsuarios extends Model
{
    use HasFactory;

    //modelo que contiene los tipos de usuarios
    //tiene id, tipo_usuario
    protected $fillable = [
        'tipo_usuario'
    ];

    //tipos_usuarios tiene muchos usuarios
    public function usuarios()
    {
        return $this->hasMany('App\Models\Usuarios');
    }

    //tipos_usuarios tiene muchos usuarios_has_colegios
    public function usuarios_has_colegios()
    {
        return $this->hasMany('App\Models\UsuariosHasColegios');
    }
    
}
