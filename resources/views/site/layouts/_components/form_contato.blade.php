{{ $slot }}
<form action = "{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder = "Nome" class = {{ $classe }}>
    @if( $errors->has('nome') )
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder = "Telefone" class = {{ $classe }}>
    {{ $errors->first('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder = "E-mail" class = {{ $classe }}>
    {{ $errors->first('email') ? $errors->first('email') : '' }}
    <br>
    <select name ="motivo_contatos_id" class = {{ $classe }}>
        <option value = "">Qual o motivo do contato?</option>
        {{-- Criando um array associativo com o foreach --}}
        @foreach ($motivo_contatos as $key => $motivo_contato)
        <option value = "{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : ''}}>{{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    {{ $errors->first('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <textarea name = "mensagem" class = {{ $classe }}> {{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}
    </textarea>
    {{ $errors->first('mensagem') ? $errors->first('mensagem') : '' }}
    <br>
    <button type = "submit" class = {{ $classe }}>ENVIAR</button>
</form>

<!-- Exibindo os erros de validação
any() = verifica se existe algum erro, antes de exibir
-->
{{-- @if ($errors->any())
    <div style = "position: absolute; top: 0; left: 0; width: 100%; background: red; color: white; padding: 10px;">
        @foreach ($errors->all() as $erro)
            {{ $erro }} <br>
        @endforeach
    </div>
@endif --}}
