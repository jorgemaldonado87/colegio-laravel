<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
    use HasFactory;

    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    //periodos tiene id,nombre,fecha_inicio,fecha_fin,agno,colegios_id
    protected $fillable = [
        'nombre',
        'fecha_inicio',
        'fecha_fin',
        'agno',
        'colegios_id'
    ];

    //periodos pertenece a colegios
    public function colegios()
    {
        return $this->belongsTo('App\Models\Colegios');
    }

}
