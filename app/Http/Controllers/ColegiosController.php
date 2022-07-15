<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colegios;
use App\Models\Usuarios;
use App\Models\Niveles;
use App\Models\Cursos;
use App\Models\Materias;
use App\Models\Periodos;

class ColegiosController extends BaseController
{
    //method to create a new colegio and associate it to a user by token
    public function crearColegio(Request $request)
    {

        
        $user = $request->user();
        $dbUser = Usuarios::where('rut', '=', $user->rut)->first();
        
        $colegio = new Colegios();
        $colegio->nombre = $request->nombre;
        $colegio->direccion = $request->direccion;
        $colegio->nombre_corto = $request->nombre_corto;
        $colegio->tipos_colegios_id = $request->tipos_colegios_id;
        
        $dbUser->colegios()->save($colegio);


        
    }   

    //metodo traer niveles de un colegio
    public function traerNiveles($id)
    {
        //trae los niveles de un colegio
        $niveles = Colegios::find($id)->niveles;
        //retorna los niveles
        return $this->success($niveles);
    }

    //metodo para crear un nuevo nivel en un colegio
    //$id es el id del colegio
    public function crearNivel($id, Request $request)
    {
        //trae el colegio
        $colegio = Colegios::find($id);
        //crea el nuevo nivel
        $nivel = new Niveles();
        $nivel->nombre = $request->nombre;

        //guarda el nivel en el colegio
        $colegio->niveles()->save($nivel);
    }

    //crear curso en un nivel de un colegio
    public function crearCurso($id, Request $request)
    {
        //trae el colegio
        $coelgio = Colegios::find($id); 

        //crea el curso
        $curso = new Cursos();
        $curso->nombre = $request->nombre;
        $curso->niveles_id = $request->niveles_id;
        //guarda el curso en el nivel
        $coelgio->niveles()->save($curso);
    }

    //traer cursos de un colegio
    public function traerCursos($id)
    {
        //trae los cursos de un colegio
        $colegio = Colegios::find($id);
        return $this->success($colegio->cursos);

    }

    //crear materia en colegio
    public function crearMateria($id, Request $request)
    {
        //trae el colegio
        $colegio = Colegios::find($id);
        //crea la materia
        $materia = new Materias();
        $materia->nombre = $request->nombre;
        $materia->colegios_id = $request->colegios_id;
        //guarda la materia en el curso
        $colegio->materias()->save($materia);
        return $this->success($materia);
    }

    //traer materias de un colegio
    public function traerMaterias($id)
    {
        //trae las materias de un colegio
        $colegio = Colegios::find($id);
        return $this->success($colegio->materias);
    }

    //crear periodo en un colegio
    public function crearPeriodo($id, Request $request)
    {
        //trae el colegio
        $colegio = Colegios::find($id);
        //crea el periodo
        $periodo = new Periodos();
        $periodo->nombre = $request->nombre;
        $periodo->colegios_id = $request->colegios_id;
        $periodo->fecha_inicio = $request->fecha_inicio;
        $periodo->fecha_fin = $request->fecha_fin;
        $periodo->agno = $request->agno;
        //guarda el periodo en el curso
        $colegio->periodos()->save($periodo);
        return $this->success($periodo);
    }

    //traer periodos de un colegio
    public function traerPeriodos($id)
    {
        //trae los periodos de un colegio
        $colegio = Colegios::find($id);
        return $this->success($colegio->periodos);
    }
}
