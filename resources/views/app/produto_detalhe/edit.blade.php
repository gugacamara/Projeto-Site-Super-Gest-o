 @extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Editar Detalhes do Produto</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="">Voltar</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">

        <h4>Produto</h4>
        <div>Nome: {{ $produto_detalhe->item->nome }}</div>
        <br>
        <div>Descrição: {{ $produto_detalhe->item->descricao }}</div>

        <div style="width: 40%; margin-left: auto; margin-right: auto; margin-top: 50px;">
            @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
            {{-- a view recebe unidades e produtos do controller e precisa passar para o componente --}}
            @endcomponent
        </div>
@endsection

