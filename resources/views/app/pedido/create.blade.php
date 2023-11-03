@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Adicionar Pedido</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 40%; margin-left: auto; margin-right: auto; margin-top: 50px;">
            @component('app.pedido._components.form_create_edit', ['clientes' => $clientes])
            {{-- a view recebe a unidades do controller e precisa passar para o componente --}}
            @endcomponent
        </div>
@endsection

