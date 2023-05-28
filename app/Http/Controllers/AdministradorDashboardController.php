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
        $query = DB::table('dbo.compras')->get();
        
        return view ('admi.dashboard', ['compras' => $query] );
    }


}
