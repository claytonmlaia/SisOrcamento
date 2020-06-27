<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // criar regra, caso seja gestor, direcionar para página (HOME),
        // se for vendedor, para outra página, com menus reduzidos (HOMEUSUARIO)
        return view('home');
    }
}
