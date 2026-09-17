<div>

    {{-- TÍTULO --}}
    <div class="mb-4">

        <h2 class="fw-bold">
            Dashboard
        </h2>

        <p class="text-muted">
            Visão geral do controle de estoque
        </p>

    </div>


    {{-- CARDS --}}
    <div class="row g-4 mb-4">

        {{-- PRODUTOS --}}
        <div class="col-md-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Produtos cadastrados
                            </small>

                            <h2 class="fw-bold mt-2">
                                {{ $totalProdutos }}
                            </h2>

                        </div>

                        <div class="fs-1 text-primary">

                            <i class="bi bi-box-seam"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ESTOQUE --}}
        <div class="col-md-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Itens em estoque
                            </small>

                            <h2 class="fw-bold mt-2">
                                {{ $totalEstoque }}
                            </h2>

                        </div>

                        <div class="fs-1 text-success">

                            <i class="bi bi-boxes"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ESTOQUE BAIXO --}}
        <div class="col-md-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Estoque baixo
                            </small>

                            <h2 class="fw-bold mt-2 text-danger">
                                {{ $estoqueBaixo }}
                            </h2>

                        </div>

                        <div class="fs-1 text-danger">

                            <i class="bi bi-exclamation-triangle"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- MOVIMENTAÇÕES --}}
        <div class="col-md-3">

            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center">

                        <div>

                            <small class="text-muted">
                                Movimentações
                            </small>

                            <h2 class="fw-bold mt-2">
                                {{ $totalMovimentacoes }}
                            </h2>

                        </div>

                        <div class="fs-1 text-warning">

                            <i class="bi bi-arrow-left-right"></i>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- ÚLTIMAS MOVIMENTAÇÕES --}}
    <div class="card shadow-sm border-0">

        <div class="card-header bg-white">

            <h5 class="mb-0">
                Últimas movimentações
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>
                                Produto
                            </th>

                            <th>
                                Tipo
                            </th>

                            <th>
                                Quantidade
                            </th>

                            <th>
                                Data
                            </th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse ($ultimasMovimentacoes as $movimentacao)

                            <tr>

                                <td>

                                    {{ $movimentacao->produto->nome ?? 'Produto não encontrado' }}

                                </td>

                                <td>

                                    @if ($movimentacao->tipo == 'entrada')

                                        <span class="badge bg-success">

                                            <i class="bi bi-arrow-down"></i>
                                            Entrada

                                        </span>

                                    @else

                                        <span class="badge bg-danger">

                                            <i class="bi bi-arrow-up"></i>
                                            Saída

                                        </span>

                                    @endif

                                </td>

                                <td>

                                    {{ $movimentacao->quantidade }}

                                </td>

                                <td>

                                    {{ \Carbon\Carbon::parse(
                                        $movimentacao->data_movimentacao
                                    )->format('d/m/Y') }}

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="4"
                                    class="text-center text-muted py-4"
                                >
                                    Nenhuma movimentação registrada.
                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>