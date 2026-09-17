<div class="mt-5">
    <form class="row g-3" wire:submit.prevent='store'>
        <div class="col-12">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome do produto" wire:model='nome'>
        </div>
        <div class="col-12">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" class="form-control" id="valor" placeholder="R$" wire:model='valor'>
        </div>
        <div class="col-md-12">
            <label for="qtd_estoque" class="form-label">Qtd. Estoque</label>
            <input type="text" class="form-control" id="qtd_estoque" wire:model='qtd_estoque'>
        </div>
        <div class="col-md-12">
            <label for="qtd_minima" class="form-label">Qtd. Mínima</label>
            <input type="text" class="form-control" id="qtd_minima" wire:model='qtd_minima'>
        </div>

        <div class="mb-3">
            <label class="form-label">Data Validade</label>
            <input type="date" class="form-control" wire:model='data_valid'>
            @error('data_valid')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
        </div>
    </form>
</div>
