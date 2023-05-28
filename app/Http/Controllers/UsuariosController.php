<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller
{
    public function index()
    {
        $query = DB::table('dbo.cuentas')->get();
        
        return view ('admi.usuarios', ['listado' => $query] );
    }
}
