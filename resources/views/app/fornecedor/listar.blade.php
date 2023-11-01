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
        <div style=" margin-left: auto; margin-right: auto; margin-top: 50px;">
                <table border="1" width="50%" style=" margin-left: auto; margin-right: auto; margin-top: 50px;">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($fornecedores as $fornecedor)
                        <tr>
                            <td>{{ $fornecedor->nome }}</td>
                            <td>{{ $fornecedor->site }}</td>
                            <td>{{ $fornecedor->uf }}</td>
                            <td>{{ $fornecedor->email }}</td>
                            <td><a href="{{ route('app.fornecedor.excluir', $fornecedor->id) }}">Excluir</a></td>
                            {{-- Enviando o id do fornecedor para a rota, para que possa ser editado --}}
                            <td><a href="{{ route('app.fornecedor.editar', $fornecedor->id) }}">Editar</a></td>
                        </tr>
                        <tr>
                            <td colspan="6">
                                <p>Lista de produtos</p>
                                <table border="1" style="margin:20px;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nome</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($fornecedor->produtos as $key => $produto )
                                        <tr>
                                            <td>{{ $produto->id }}</td>
                                            <td>{{ $produto->nome }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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
