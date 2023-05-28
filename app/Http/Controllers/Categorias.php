<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Categorias extends Controller
{
    public function index()
    {
        $query = DB::table('dbo.categoria')->get();
        
        return view ('welcome', ['listado' => $query] );
    }

    public function transbank()
    {
        $url = request()->get('Url_to_pay');
        return view('welcome')->with('url', $url);
    }

}
