<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosHasColegios extends Model
{
    use HasFactory;
    //modelo que contiene la relacion de muchos a muchos entre usuarios y colegios
    //usuarios_has_colegios tiene usuarios_id, colegios_id, tipo_usuarios_id
    protected $fillable = [
        'usuarios_id',
        'colegios_id',
        'tipo_usuarios_id'
    ];

    //usuarios_has_colegios tiene un usuarios
    public function usuarios()
    {
        return $this->belongsTo('App\Models\Usuarios');
    }

    //usuarios_has_colegios tiene un colegios
    public function colegios()
    {
        return $this->belongsTo('App\Models\Colegios');
    }

    //usuarios_has_colegios tiene un tipo_usuarios
    public function tipo_usuarios()
    {
        return $this->belongsTo('App\Models\TipoUsuarios');
    }
    
}
