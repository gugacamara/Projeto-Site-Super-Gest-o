<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::with('produtos')->where(
            'nome', 'like', '%'.$request->input('nome').'%')
            ->where(
                'site', 'like', '%'.$request->input('site').'%')
            ->where(
                'uf', 'like', '%'.$request->input('uf').'%')
            ->where(
                'email', 'like', '%'.$request->input('email').'%')
            ->paginate(5);
                                                    // enviando o request para ser usado na paginação da view
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {

        $msg= '';

        // Inclusão de dados
        if($request->input('_token') != '' && $request->input('id') == ''){
        $regras = [
            'nome' => 'required|min:3|max:40|unique:fornecedores',
            'site' => 'required',
            'uf' => 'required|min:2|max:2',
            'email' => 'required|email'
        ];

        $feedback_erros = [
            'required' => 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',
            'site.required' => 'O campo site deve ser preenchido',
            'uf.min' => 'O campo uf deve ter no mínimo 2 caracteres',
            'uf.max' => 'O campo uf deve ter no máximo 2 caracteres',
            'email.email' => 'O e-mail informado não é válido'
        ];
        $request->validate($regras, $feedback_erros);
        $fornecedor = new Fornecedor();
        $fornecedor->create($request->all());

        $msg = 'Cadastro realizado com sucesso!';
        }

        //Edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update){
                $msg = 'Atualização realizada com sucesso!';
            }else{
                $msg = 'Falha ao atualizar!';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

    return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        echo $id;
        $fornecedor = Fornecedor::find($id);
        // Usaremos a mesma view para adicionar e editar, porém, quando for editar, o botão salvar será substituído por um botão atualizar
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg ]);
    }

    public function excluir($id)
    {
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor.listar');
    }

}
