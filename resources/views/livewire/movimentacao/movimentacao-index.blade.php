<div class="mt-5">
    <h1 class="mb-4">Gestao de Movimentação</h1>

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

    <div class="mb-4">
        <input type="text" wire:model.live='search' placeholder="Pesquisar..." class="form-control">
    </div>



    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Produto</th>
                <th scope="col">Quantidade Movimentada</th>
                <th scope="col">Data movimentacao</th>
                <th scope="col">Tipo</th>
                <th scope="col">Quantidade Atual</th>
                <th scope="col">Usuário</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimentacao as $m)
                <tr>
                    <th scope="row">{{ $m->id }}</th>
                    <th scope="row">{{ $m->produto_id }} . {{ $m->produto->nome }}</th>
                    <td>{{ $m->quantidade }}</td>
                    <td>{{ \Carbon\Carbon::parse($m->data_movimentacao)->format('d/m/Y') }}</td>
                    <td>
                        @if ($m->tipo == 'entrada')
                            <span class="badge bg-primary">Entrada</span>
                        @else
                            <span class="badge bg-danger">Saida</span>
                        @endif
                    </td>
                    <td> {{ $m->produto->qtd_estoque }}</td>
                    <td> {{ $m->user_id }} . {{ $m->user->name }}</td>
                    <td>

                        <button wire:click='delete({{ $m->id }})' class="btn btn-sm btn-danger">Excluir</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>