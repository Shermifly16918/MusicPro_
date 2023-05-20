<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class AutenticacionController extends Controller
{
    public function login()
    {
        return view ("auth.login");
    }

    public function registro()
    {
        return view("auth.registro");
    }

    public function registroUsuario(Request $request)
    {
        $request->validate([
            'usuario'=>'required',
            'nombres'=>'required',
            'apellidos'=>'required',
            'email'=>'required|email|unique:cuentas',
            'contrasena'=>'required|min:5|max:20',
        ]);

        $cuenta = new Cuenta();
        $cuenta->usuario=$request->usuario;
        $cuenta->nombres=$request->nombres;
        $cuenta->apellidos=$request->apellidos;
        $cuenta->email=$request->email;
        $cuenta->contrasena=$request->contrasena;

        $res= $cuenta->save();

        if($res){
            return back()->with('success','Registrado')->isRedirection('welcome');
        }else{
            return back()->with('fail', 'No estas registrado');
        }
    }
}
