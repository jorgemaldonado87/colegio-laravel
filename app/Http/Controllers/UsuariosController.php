<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;
class UsuariosController extends BaseController
{
    //metodo para traer los colegios de un usuario
    public function traerColegios($rut)
    {   
       
        //trae los colegios de un usuario
        $colegios = Usuarios::where('rut', '=', $rut)->first()->colegios;
        //retorna los colegios
        return $this->success($colegios);
    }
}
