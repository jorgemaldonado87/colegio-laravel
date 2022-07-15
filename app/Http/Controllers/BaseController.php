<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    //metodo para retornar success
    public function success($data, $code = 200)
    {
        return response()->json(['data' => $data], $code);
    }
   
    //metodo para retornar error
    public function error($message, $code = 404)
    {
        return response()->json(['error' => $message], $code);
    }
}
