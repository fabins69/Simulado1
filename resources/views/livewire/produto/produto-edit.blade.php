<div class="mt-5">
    <form class="row g-3" wire:submit.prevent='update'>
        <div class="col-6">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome do produto" wire:model='nome'>
        </div>
        <div class="col-6">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" class="form-control" id="valor" placeholder="R$" wire:model='valor'>
        </div>
        <div class="col-md-6">
            <label for="qtd_estoque" class="form-label">Qtd. Estoque</label>
            <input type="text" class="form-control" id="qtd_estoque" wire:model='qtd_estoque'>
        </div>
        <div class="col-md-6">
            <label for="qtd_minima" class="form-label">Qtd. Mínima</label>
            <input type="text" class="form-control" id="qtd_minima" wire:model='qtd_minima'>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        </div>
    </form>
</div>