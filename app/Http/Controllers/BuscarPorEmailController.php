<?php

namespace App\Http\Controllers;

use App\Models\Cuenta;
use Illuminate\Http\Request;

class BuscarPorEmailController extends Controller
{
    public function buscar(Request $request)
    {
        $email = $request->input('email');
        $usuarios = Cuenta::where('email', $email)->get();

        return view('admi.email', compact('usuarios'));
    }
}
