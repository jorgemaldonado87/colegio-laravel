<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TiposColegios;

class TiposColegiosController extends BaseController
{
    //metodo para traer los tipos de colegios
    public function traerTiposColegios()
    {
        //trae los tipos de colegios
        $tipos_colegios = TiposColegios::all();
        //retorna los tipos de colegios
        return $this->success($tipos_colegios);
    }
}
