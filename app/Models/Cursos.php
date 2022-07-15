<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursos extends Model
{
    use HasFactory;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    //cursos tiene id,nombre,nombre_corto,codigo,colegios_id,niveles_id
    protected $fillable = [
        'nombre',
        'nombre_corto',
        'codigo',
        'colegios_id',
        'niveles_id'
    ];

    //cursos pertenece a niveles
    public function niveles()
    {
        return $this->belongsTo('App\Models\Niveles');
    }

    //cursos pertenece a colegios
    public function colegios()
    {
        return $this->belongsTo('App\Models\Colegios');
    }
}
