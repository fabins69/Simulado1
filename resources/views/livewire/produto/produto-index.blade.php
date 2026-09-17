<div class="mt-5">

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    {{-- ALERTA GERAL DE ESTOQUE BAIXO --}}
    @php
        $produtosEstoqueBaixo = $produtos->filter(function ($produto) {
            return $produto->qtd_estoque < $produto->qtd_minima;
        });
    @endphp

    @if ($produtosEstoqueBaixo->count() > 0)
        <div class="alert alert-warning">
            <strong>⚠️ Atenção!</strong>

            Existem {{ $produtosEstoqueBaixo->count() }}
            produto(s) com estoque abaixo do mínimo.

            <ul class="mb-0 mt-2">
                @foreach ($produtosEstoqueBaixo as $produto)
                    <li>
                        <strong>{{ $produto->nome }}</strong>

                        - Estoque atual:
                        {{ $produto->qtd_estoque }}

                        | Mínimo:
                        {{ $produto->qtd_minima }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


    {{-- PESQUISA --}}
    <div class="mb-3">
        <input
            type="text"
            wire:model.live="search"
            placeholder="Pesquisar..."
            class="form-control"
        >
    </div>


    {{-- TABELA --}}
    <table class="table table-hover">

        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Qtd. Estoque</th>
                <th scope="col">Qtd. Mínima</th>
                <th scope="col">Status</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($produtos as $p)

                <tr class="{{ $p->qtd_estoque < $p->qtd_minima ? 'table-danger' : '' }}">

                    <th scope="row">
                        {{ $p->id }}
                    </th>

                    <td>
                        {{ $p->nome }}
                    </td>

                    <td>
                        R$ {{ number_format($p->valor, 2, ',', '.') }}
                    </td>

                    <td>
                        {{ $p->qtd_estoque }}
                    </td>

                    <td>
                        {{ $p->qtd_minima }}
                    </td>


                    {{-- STATUS DO ESTOQUE --}}
                    <td>

                        @if ($p->qtd_estoque < $p->qtd_minima)

                            <span class="badge bg-danger">
                                ⚠️ Estoque baixo
                            </span>

                        @elseif ($p->qtd_estoque == $p->qtd_minima)

                            <span class="badge bg-warning text-dark">
                                Estoque mínimo
                            </span>

                        @else

                            <span class="badge bg-success">
                                Estoque normal
                            </span>

                        @endif

                    </td>


                    {{-- AÇÕES --}}
                    <td>

                        <a
                            href="{{ route('produto.edit', ['id' => $p->id]) }}"
                            class="btn btn-sm btn-info"
                        >
                            Editar
                        </a>

                        <button
                            wire:click="delete({{ $p->id }})"
                            class="btn btn-sm btn-danger"
                            onclick="confirm('Deseja realmente excluir este produto?') || event.stopImmediatePropagation()"
                        >
                            Excluir
                        </button>

                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="7" class="text-center">
                        Nenhum produto encontrado.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>