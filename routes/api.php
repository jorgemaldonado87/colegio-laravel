<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//rutas de autentificacion bajo prefijo /auth
Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
});

Route::get('/', 'App\Http\Controllers\AuthController@test');

//grupo de ruta usuarios
Route::group(['prefix' => 'usuarios'], function () {
    Route::get('{rut}/colegios', 'App\Http\Controllers\UsuariosController@traerColegios');
});

//grupo de rutas tipos_colegios
Route::group(['prefix' => 'tipos_colegios'], function () {
    Route::get('', 'App\Http\Controllers\TiposColegiosController@traerTiposColegios');
});

//grupo de rutas de colegios
Route::group(['prefix' => 'colegios'], function () {
    Route::post('', 'App\Http\Controllers\ColegiosController@crearColegio');
    //traer niveles de un colegio
    Route::get('{id}/niveles', 'App\Http\Controllers\ColegiosController@traerNiveles');
    //crear nivel
    Route::post('{id}/niveles', 'App\Http\Controllers\ColegiosController@crearNivel');
    //crear curso
    Route::post('{id}/cursos', 'App\Http\Controllers\ColegiosController@crearCurso');
    //traer cursos de un colegio
    Route::get('{id}/cursos', 'App\Http\Controllers\ColegiosController@traerCursos');
    //traer materias de un colegio
    Route::get('{id}/materias', 'App\Http\Controllers\ColegiosController@traerMaterias');
    //crear materia
    Route::post('{id}/materias', 'App\Http\Controllers\ColegiosController@crearMateria');
    //traer periodos de un colegio
    Route::get('{id}/periodos', 'App\Http\Controllers\ColegiosController@traerPeriodos');
    //crear periodo
    Route::post('{id}/periodos', 'App\Http\Controllers\ColegiosController@crearPeriodo');
});