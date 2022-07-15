<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colegios extends Model
{
    use HasFactory;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    //colegios tiene id, codigo, nombre, direccion, nombre_corto, tipo_colegios_id
    protected $fillable = [
        'codigo',
        'nombre',
        'direccion',
        'nombre_corto',
        'tipos_colegios_id'
    ];

    //colegios tiene un tipo_colegios
    public function tipo_colegios()
    {
        return $this->belongsTo('App\Models\TipoColegios');
    }

    //colegios tiene muchos niveles
    public function niveles()
    {
        return $this->hasMany('App\Models\Niveles');
    }
    

    //colegio tiene muchos cursos
    public function cursos()
    {
        return $this->hasMany('App\Models\Cursos');
    }

    //colegios tiene muchas materias
    public function materias()
    {
        return $this->hasMany('App\Models\Materias');
    }

    //colegio tiene muchos periodos
    public function periodos()
    {
        return $this->hasMany('App\Models\Periodos');
    }
}
