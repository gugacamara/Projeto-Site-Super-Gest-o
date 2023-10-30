<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//Importando o model SiteContato
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function salvar_Dados(Request $request){
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email', //email = valida se é um email
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback_erros = [
            //Mensagens de erro(Validação)
            'required' => 'O campo :attribute precisa ser preenchido', // required é comum a 3 campos
            'nome.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome precisa ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'email.email' => 'O email informado não é válido',
            'motivo_contatos_id.required' => 'O campo motivo do contato precisa ser preenchido',
            'mensagem.max' => 'O campo mensagem precisa ter no máximo 2000 caracteres'
        ];

        $request->validate($regras, $feedback_erros);

        SiteContato::create($request->all());
        
        return redirect()->route('site.index');
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
