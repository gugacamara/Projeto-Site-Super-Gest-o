
@isset($fornecedores)
    @forelse ($fornecedores as $indices => $fornecedor)
        Interação atual do laço: {{ $loop->iteration }}
        <br>
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Não informado'}}
        <br>
        DDD: {{ $fornecedor['ddd'] }}
        <br>
        Telefone: {{ $fornecedor['telefone'] }}
        <br>
        @if ($loop->first)
            ***Primeira Interação do loop: {{ $loop->first }}
        @endif
        @if ($loop->last)
            ***Última Interação do loop: {{ $loop->last }}
            <br>
            ***Total de Interações: {{ $loop->count }}
        @endif
        <hr>
    @endforeach
@endforelse

