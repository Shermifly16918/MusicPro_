<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteHomeController extends Controller
{
    public function home()
    {
        return view ("cliente.home");
    }
}
