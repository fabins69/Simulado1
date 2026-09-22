<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-white py-3">
            <h4 class="mb-0 text-primary fw-bold"> Editar Características do Produto </h4>
        </div>
        <div class="card-body">
            
            {{-- Mensagens de Feedback --}}
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- Formulário disparando a função de update --}}
            <form wire:submit.prevent="update">
                
                {{-- PRODUTO --}}
                <div class="mb-3">
                    <label for="produto_id" class="form-label fw-semibold"> Produto </label>
                    <select id="produto_id" wire:model="produto_id" class="form-select @error('produto_id') is-invalid @enderror">
                        <option value=""> Selecione um produto </option>
                        @if (!empty($produtos))
                            @foreach ($produtos as $produto)
                                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('produto_id')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>

                <div class="row">
                    {{-- COR --}}
                    <div class="col-md-6 mb-3">
                        <label for="cor" class="form-label fw-semibold"> Cor </label>
                        <input type="text" id="cor" wire:model="cor" class="form-control @error('cor') is-invalid @enderror" placeholder="Ex: Preto">
                        @error('cor')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                    {{-- TEXTURA --}}
                    <div class="col-md-6 mb-3">
                        <label for="textura" class="form-label fw-semibold"> Textura </label>
                        <input type="text" id="textura" wire:model="textura" class="form-control @error('textura') is-invalid @enderror" placeholder="Ex: Lisa, áspera, fosca...">
                        @error('textura')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- PESO --}}
                    <div class="col-md-6 mb-3">
                        <label for="peso" class="form-label fw-semibold"> Peso </label>
                        <input type="number" step="0.001" id="peso" wire:model="peso" class="form-control @error('peso') is-invalid @enderror" placeholder="Ex: 1.500">
                        @error('peso')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>

                    {{-- UNIDADE DE MEDIDA --}}
                    <div class="col-md-6 mb-3">
                        <label for="unidade_medida" class="form-label fw-semibold"> Unidade de Medida </label>
                        <select id="unidade_medida" wire:model="unidade_medida" class="form-select @error('unidade_medida') is-invalid @enderror">
                            <option value=""> Selecione </option>
                            <option value="un">Unidade (un)</option>
                            <option value="kg">Quilograma (kg)</option>
                            <option value="g">Grama (g)</option>
                            <option value="mg">Miligrama (mg)</option>
                            <option value="l">Litro (L)</option>
                            <option value="ml">Mililitro (ml)</option>
                            <option value="m">Metro (m)</option>
                            <option value="cm">Centímetro (cm)</option>
                            <option value="mm">Milímetro (mm)</option>
                            <option value="m2">Metro quadrado (m²)</option>
                            <option value="m3">Metro cúbico (m³)</option>
                        </select>
                        @error('unidade_medida')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    {{-- MARCA --}}
                    <div class="col-md-6 mb-3">
                        <label for="marca" class="form-label fw-semibold"> Marca </label>
                        <input type="text" id="marca" wire:model="marca" class="form-control @error('marca') is-invalid @enderror" placeholder="Ex: Tramontina">
                        @error('marca')
                            <div class="invalid-feedback"> {{ $message }} </div>
                        @enderror
                    </div>
                </div>

                {{-- DESCRIÇÃO --}}
                <div class="mb-3">
                    <label for="descricao" class="form-label fw-semibold"> Descrição / Observações </label>
                    <textarea id="descricao" wire:model="descricao" rows="4" class="form-control @error('descricao') is-invalid @enderror" placeholder="Informações adicionais sobre esta característica..."></textarea>
                    @error('descricao')
                        <div class="invalid-feedback"> {{ $message }} </div>
                    @enderror
                </div>

                {{-- BOTÕES DE AÇÃO --}}
                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('caracteristica.index') }}" class="btn btn-secondary px-4"> Cancelar </a>
                    <button type="submit" class="btn btn-warning px-4 text-dark fw-semibold"> Atualizar Característica </button>
                </div>
            </form>
        </div>
    </div>
</div>
