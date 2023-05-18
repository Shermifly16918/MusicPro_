<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatosPruebaController extends Controller
{
    public function index(){
        try{
            if(DB::connection()->getDatabaseName()){
                echo "Si! conectado con exito a la base de datos: " .
                DB::select('select * from help', [1]);
            }else{
                die("No se pudo conectar a la base de datos.
                Comprueba tu configuracion");
            }
        }catch (\Exception $e){
            die("No se pudo conectar a la base de datos. Error: " . $e);
        }
    }
}
