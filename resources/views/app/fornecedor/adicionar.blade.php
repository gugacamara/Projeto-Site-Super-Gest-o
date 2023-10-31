 @extends('app.layouts.basico')

@section('titulo', 'Fornecedores')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <p>Fornecedor - Adicionar</p>
    </div>
    <div class="menu">
        <ul>
            <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
            <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
        </ul>
    </div>
    <div class="informacao-pagina">
        <div style="width: 40%; margin-left: auto; margin-right: auto; margin-top: 50px;">
            <h2>{{ $msg ?? '' }}</h2>
            <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                @csrf
                {{-- Caso o campo não seja preenchido, será exibido o valor padrão, que é o valor para editar o fornecedor. --}}
                <input type="text" name="nome" placeholder="Nome" value="{{ $fornecedor->nome ?? old('nome') }}" class="borda-preta">
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                <input type="text" name="site" placeholder="Site" value="{{ $fornecedor->site ?? old('site') }}" class="borda-preta">
                {{ $errors->has('site') ? $errors->first('site') : '' }}

                <input type="text" name="uf" placeholder="UF" value="{{ $fornecedor->uf ?? old('uf') }}" class="borda-preta">
                {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                <input type="text" name="email" placeholder="E-mail" value="{{ $fornecedor->email ?? old('email') }}" class="borda-preta">
                {{ $errors->has('email') ? $errors->first('email') : '' }}

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
@endsection

