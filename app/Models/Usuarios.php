<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User;

class Usuarios extends User implements JWTSubject
{
    use Notifiable;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    //usuarios tiene  id, rut, nombres, apellidos, correo, contrasena, creado_en, actualizado_en, eliminado_en


    protected $fillable = [
        'rut',
        'nombres',
        'apellidos',
        'correo',
        'contrasena',
        'creado_en',
        'actualizado_en',
        'eliminado_en'
    ];

    protected $hidden = [
        'contrasena'
    ];

  /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
  

    public function getAuthPassword()
    {
        return $this->contrasena;
    }

    //usarios tiene muchos colegios a traves de tabla pivote usuarios_has_colegios
    public function colegios()
    {
        return $this->belongsToMany('App\Models\Colegios', 'usuarios_has_colegios', 'usuarios_id', 'colegios_id');
    }
}
    
