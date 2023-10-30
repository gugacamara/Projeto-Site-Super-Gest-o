<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class SobrenosController extends Controller
{
    //Definindo o middleware localmente para o controller
    public function __construct()
    {
        // Definindo o middleware para o controller
        $this->middleware('log.acesso');
    }

    public function sobrenos()
    {
        return view('site.sobrenos');
    }
}
