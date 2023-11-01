<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use App\Unidade;
use App\ProdutoDetalhe;
use App\Item;
use App\Fornecedor;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Método with para o carregamento adiantado de relacionamentos(eager loading)
        $produtos = Item::with('itemDetalhe', 'fornecedor')->paginate(10);

        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores] );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //store está recebendo um request de um formulário no create.blade.php
        $regras=[
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:5|max:2000',
            'peso' => 'required',
            'unidade_id' => 'required|exists:unidades,id',// verifica se existe o id na tabela unidades
            'fornecedor_id' => 'required|exists:fornecedores,id'
        ];

        $feedback_erros=[
            'required'=> 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 5 caracteres',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'

        ];
        $request->validate($regras, $feedback_erros);

        Item::create($request->all());

        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $fornecedores = Fornecedor::all();
        $unidades = Unidade::all();
        return view( 'app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores] );
        //reutilizando o formulário de cadastro, para edição.
        //return view( 'app.produto.create', ['produto' => $produto, 'unidades' => $unidades] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras=[
            'nome' => 'required|min:3|max:40',
            'descricao' => 'required|min:5|max:2000',
            'peso' => 'required',
            'unidade_id' => 'required|exists:unidades,id',// verifica se existe o id na tabela unidades
            'fornecedor_id' => 'required|exists:fornecedores,id'
        ];

        $feedback_erros=[
            'required'=> 'O campo :attribute deve ser preenchido',
            'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'descricao.min' => 'O campo descrição deve ter no mínimo 5 caracteres',
            'descricao.max' => 'O campo descrição deve ter no máximo 2000 caracteres',
            'unidade_id.exists' => 'A unidade de medida informada não existe',
            'fornecedor_id.exists' => 'O fornecedor informado não existe'
        ];
        $request->validate($regras, $feedback_erros);

        // update está recebendo um request de um formulário no edit.blade.php
        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto -> delete();
        return redirect()->route('produto.index');
    }
}
