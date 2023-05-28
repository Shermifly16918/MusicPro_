<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use App\Models\Cliente;
use Doctrine\DBAL\Types\BigIntType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;

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
            'email'=>'required|email',
            'contrasena'=>'required|min:5|max:20',
        ]);

        $cuenta = Cuenta::where('email', '=', $request->email)->first();
        if($cuenta){
            if(Hash::check($request->contrasena, $cuenta->contrasena)){
                $request->session()->put('loginId', $cuenta->id);
                return redirect('usuario');
            }else{
                return back()->with('fail', 'La contraseña es incorrecta');
            }
        }else{
            return back()->with('fail', 'El email no esta registrado');
        }
    }

    public function dashboard(Request $request)
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = Cuenta::where('id', '=', Session::get('loginId'))->first();
        }
        return view('usuario.dashboard', compact('data'));
    }

    public function cerrarSesion()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
