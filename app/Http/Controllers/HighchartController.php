<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Cuenta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighchartController extends Controller
{

    public function mostrarGrafico()
    {
        $userData = DB::table('compras')
            ->select(DB::raw('COUNT(*) as count'))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('count')
            ->toArray();

        return view('prueba', compact('userData'));
    }
}
