<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cuenta;

class AdministradorDashboardController extends Controller
{
    public function dashboard()
    {
        return view ("admi.dashboard");
    }

    public function index()
    {
        $compras = DB::table('dbo.compras')
            ->latest()
            ->take(10)
            ->get();

        $usuarios = DB::table('dbo.cuentas')
            ->latest()
            ->take(10)
            ->get();  
              
        return view('admi.dashboard', compact('compras', 'usuarios'));
    }


}
