<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Cliente;
use Doctrine\DBAL\Types\BigIntType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $cuenta->contrasena= Hash::make($request->contrasena);

        $resCuenta= $cuenta->save();
        $user_id = Cuenta::select('id')->orderBy('id', 'DESC')->first(); // Obtener el primer resultado de la consulta

        if ($user_id) {
            DB::insert('insert into cliente (cuenta_id) values (?)', [$user_id->id]);
            $data = []; // Array vacío si no necesitas insertar otros datos
            DB::table('cliente')->insert($data);
        }

        if($resCuenta){
            return redirect()->route('login')->with('success', 'Registrado');
            
        }else{
            return back()->with('fail', 'No estas registrado');
        }
    }

    public function loginUsuario(Request $request)
    {
        $request->validate([
            'email'=>'required|email|unique:cuentas',
            'contrasena'=>'required|min:5|max:20',
        ]);

        $cuenta = Cuenta::where('email', '=', $request->email)->first();
        if($cuenta){

        }else{
            
        }
    }
}
