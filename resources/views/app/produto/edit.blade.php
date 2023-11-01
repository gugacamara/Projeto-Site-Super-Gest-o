 @extends('app.layouts.basico')

@section('titulo', 'Edição')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Editar Produto</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('produto.index') }}">Voltar</a></li>
            <li><a href="">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 40%; margin-left: auto; margin-right: auto; margin-top: 50px;">
            @component('app.produto._components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores])
            {{-- a view recebe unidades e produtos do controller e precisa passar para o componente --}}
            @endcomponent
        </div>
@endsection

