<div class="container mt-5">
    {{-- ALERTAS DE SUCESSO OU ERRO --}}
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- CARD PRINCIPAL --}}
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center bg-white py-3">
            <h4 class="mb-0 text-primary fw-bold">Características dos Produtos</h4>
            {{-- Link para a rota do seu formulário de cadastro --}}
            <a href="{{ route('caracteristica.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
                <i class="bi bi-plus-circle"></i> Nova Característica
            </a>
        </div>

        <div class="card-body">
            {{-- BARRA DE BUSCA EM TEMPO REAL --}}
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light"><i class="bi bi-search"></i></span>
                        <input type="text" wire:model.live="search" class="form-control"
                            placeholder="Buscar produto, cor, marca...">
                    </div>
                </div>
            </div>

            {{-- TABELA DE DADOS --}}
            {{-- TABELA DE DADOS ATUALIZADA --}}
            <div class="table-responsive">
                <table class="table table-hover align-middle border">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width: 20%;">Produto</th>
                            <th scope="col">Cor</th>
                            <th scope="col">Textura</th>
                            <th scope="col">Peso / Medida</th>
                            <th scope="col">Marca</th>
                            <th scope="col" style="width: 20%;">Descrição</th> {{-- Nova Coluna --}}
                            <th scope="col" style="width: 15%;" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($caracteristicas->count() > 0)
                            @foreach ($caracteristicas as $item)
                                <tr>
                                    <td>
                                        <span
                                            class="fw-semibold text-dark">{{ $item->produto->nome ?? 'Produto não identificado' }}</span>
                                    </td>
                                    <td>{{ $item->cor ?: '-' }}</td>
                                    <td>{{ $item->textura ?: '-' }}</td>
                                    <td>
                                        @if ($item->peso)
                                            {{ number_format($item->peso, 3, ',', '.') }}
                                            {{ strtoupper($item->unidade_medida) }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-secondary-subtle text-secondary px-2 py-1">
                                            {{ $item->marca ?: '-' }}
                                        </span>
                                    </td>
                                    {{-- Nova célula exibindo a descrição limitada a 50 caracteres --}}
                                    <td>
                                        <span class="text-muted small" title="{{ $item->descricao }}">
                                            {{ $item->descricao ? Str::limit($item->descricao, 50, '...') : '-' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('caracteristica.edit', $item->id) }}"
                                                class="btn btn-sm btn-outline-warning" title="Editar">
                                                <i class="bi bi-pencil"></i>
                                            </a>
                                            <button type="button" wire:click="delete({{ $item->id }})"
                                                wire:confirm="Tem certeza que deseja excluir esta característica?"
                                                class="btn btn-sm btn-outline-danger" title="Excluir">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4"> {{-- Atualizado colspan para 7 --}}
                                    <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                                    Nenhuma característica cadastrada ou encontrada.
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>


            {{-- LINKS DE PAGINAÇÃO --}}
            <div class="mt-3 d-flex justify-content-end">
                {{ $caracteristicas->links() }}
            </div>
        </div>
    </div>
</div>
