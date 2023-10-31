 @extends('app.layouts.basico')

@section('titulo', 'Fornecedores')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 40%; margin-left: auto; margin-right: auto; margin-top: 50px;">
            <form action="{{ route('app.fornecedor.listar') }}" method="post">
                @csrf
                <h4>Utilize pelo menos 1 campo para pesquisa.</h4>
                <input type="text" name="nome" placeholder="Nome" class="borda-preta">
                <input type="text" name="site" placeholder="Site" class="borda-preta">
                <input type="text" name="uf" placeholder="UF" class="borda-preta">
                <input type="text" name="email" placeholder="E-mail" class="borda-preta">
                <button type="submit" class="borda-preta">Pesquisar</button>
            </form>
        </div>
@endsection

