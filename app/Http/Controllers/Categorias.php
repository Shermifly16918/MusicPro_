<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TransbankController;

class Categorias extends Controller
{
    public function index()
    {
        $query = DB::table('dbo.categoria')->get();
        $url = request()->get('url_to_pay');
        return view ('welcome', ['listado' => $query], $url);
    }

}
