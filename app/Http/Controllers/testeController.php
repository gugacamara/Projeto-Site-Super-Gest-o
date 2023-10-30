<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testeController extends Controller
{
    public function teste(int $p1, int $p2)
    {   //Recebendo parametros da rota
        //echo "A soma de $p1 + $p2 é: ".($p1 + $p2);

        //Enviar parametros para a view com array associativo
        //return view('site.teste', ['x' => $p1, 'y' => $p2]);

        //Enviar parametros para a view com compact
        return view('site.teste', compact('p1', 'p2'));

        //Enviar parametros para a view com with
        //return view('site.teste')->with('p1', $p1)->with('p2', $p2);
    }
}
