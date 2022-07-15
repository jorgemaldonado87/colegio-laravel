<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Niveles extends Model
{
    use HasFactory;
    const CREATED_AT = 'creado_en';
    const UPDATED_AT = 'actualizado_en';
    //niveles tiene id, nombre
    protected $fillable = [
        'nombre'
    ];

    //niveles pertenece a colegios
    public function colegios()
    {
        return $this->belongsTo('App\Models\Colegios');
    }

}
