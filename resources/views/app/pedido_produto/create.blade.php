@extends('app.layouts.basico')

@section('titulo', 'Pedido Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Produtos ao Pedido</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
            <h4>Detalhes do Pedido</h4>
            <p> ID do Pedido: {{ $pedido->id }} </p>
            <p> Cliente: {{ $pedido->cliente_id }} </p>
        <div style="width: 60%; margin-left: auto; margin-right: auto; margin-top: 50px;">
            <h4>Itens do Pedido</h4>
            <table border="1" sytle="margin-left: auto; margin-right: auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Data de inclusão</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                            <td>{{ $produto->pivot->quantidade }}</td>
                            <td>
                                {{-- O pivot será para excluir pelo id unico do pedido e do produto --}}
                                <form id="form_{{$produto->pivot->id}}" method="post" action="{{ route('pedido-produto.destroy', ['pedidoProduto' => $produto->pivot->id, 'pedido_id' => $pedido->id ]) }}">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$produto->pivot->id}}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @component('app.pedido_produto._components.form_create', ['pedido' => $pedido, 'produtos' => $produtos])
            {{-- a view recebe a unidades do controller e precisa passar para o componente --}}
            @endcomponent
        </div>
@endsection

