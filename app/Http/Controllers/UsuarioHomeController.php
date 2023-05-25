<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioHomeController extends Controller
{
    public function home()
    {
        return view ("usuario.home");
    }
}
