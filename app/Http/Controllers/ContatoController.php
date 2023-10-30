<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Importando o model SiteContato
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação'
        ];

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar_Dados(Request $request){
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required|max:2000'
        ]);

        //SiteContato::create($request->all());

    }
}
        //Salvar dados no banco de dados
        //Método 1
        // $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo_contato = $request->input('motivo_contato');
        // $contato->mensagem = $request->input('mensagem');
        // $contato->save();
        // return view('site.contato');

        //Método 2
        // $contato = new SiteContato();
        // $contato->fill($request->all());
        // $contato->save();

        //Método 3
        // $contato = new SiteContato();
        // $contato->create($request->all());
