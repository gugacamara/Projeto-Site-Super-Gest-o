 @extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Listagem de Clientes</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('cliente.create') }}">Novo</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style=" margin-left: auto; margin-right: auto; margin-top: 50px;">
                <table border="1" width="50%" style=" margin-left: auto; margin-right: auto; margin-top: 50px;">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->descricao }}</td>
                            <td>{{ $produto->fornecedor->nome }}</td>
                            <td>{{ $produto->fornecedor->site }}</td>
                            <td>{{ $produto->peso }}</td>
                            <td>{{ $produto->unidade_id }}</td>
                            <td>{{ $produto->itemDetalhe->comprimento ?? '' }}</td>
                            <td>{{ $produto->itemDetalhe->largura ?? '' }}</td>
                            <td>{{ $produto->itemDetalhe->altura ?? ''  }}</td>
                            {{-- Sem o eloquent, criando array associativo no controller
                            <td>{{ $produto->comprimento ?? '' }}</td>
                            <td>{{ $produto->largura ?? '' }}</td>
                            <td>{{ $produto->altura ?? ''  }}</td> --}}
                            <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                            <td>
                                {{-- Para deletar deve-se criar um form com o método DELETE e o token CSRF --}}
                                <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                            <td><a href="{{ route('produto.edit', ['produto'=> $produto->id ]) }}">Editar</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {{ $produtos->appends($request)->links() }}
            <p> Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} (de {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }})</p>
        </div>
@endsection
