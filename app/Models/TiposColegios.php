<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposColegios extends Model
{
    use HasFactory;

    //tipos colegios tiene id, tipo_colegio
    protected $fillable = [
        'tipo_colegio'
    ];

    //tipos_colegios tiene muchos colegios
    public function colegios()
    {
        return $this->hasMany('App\Models\Colegios');
    }
    
}
