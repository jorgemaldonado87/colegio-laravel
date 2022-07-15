<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materias extends Model
{
    use HasFactory;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    //materias tiene nombre, colegios_id
    protected $fillable = [
        'nombre',
        'colegios_id'
    ];

    //materias pertenece a colegios
    public function colegios()
    {
        return $this->belongsTo('App\Models\Colegios');
    }
}
