 @extends('app.layouts.basico')

@section('titulo', 'Fornecedores')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor - Listar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 80%; margin-left: auto; margin-right: auto; margin-top: 50px;">
            @foreach ($fornecedores as $fornecedor)
                <table border="1" width="100%" >
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                            {{-- Enviando o id do fornecedor para a rota, para que possa ser editado --}}
                            <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                    </tbody>
                </table>
            @endforeach
            {{ $fornecedores->appends($request)->links() }}
            <p> Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }} (de {{ $fornecedores->firstItem() }} a {{ $fornecedores->lastItem() }})</p>
        </div>
@endsection


{{-- métodos de paginação
{{ $fornecedores->count() }} - total de registros por página
<br>
{{ $fornecedores->total() }} - total de registros da consulta
<br>
{{ $fornecedores->firstItem() }} - número do primeiro registro da página(não é o id do registro)
<br>
{{ $fornecedores->lastItem() }} - número do último registro da página(não é o id do registro) --}}
