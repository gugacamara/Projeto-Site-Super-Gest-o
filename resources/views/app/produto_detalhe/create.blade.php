@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Detalhes do Produto</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 40%; margin-left: auto; margin-right: auto; margin-top: 50px;">
            @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
            {{-- a view recebe a unidades do controller e precisa passar para o componente --}}
            @endcomponent
        </div>
@endsection

