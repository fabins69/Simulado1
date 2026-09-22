<?php

namespace App\Livewire\Caracteristica;

use Livewire\Component;
use App\Models\Produto;
use App\Models\CaracteristicaProduto;

class CaracteristicaCreate extends Component
{
    // Suas propriedades públicas existentes
    public $produto_id;
    public $cor;
    public $textura;
    public $peso;
    public $unidade_medida;
    public $marca;
    public $descricao;
    
    public $produtos = [];

    /**
     * O método mount captura o parâmetro da URL automaticamente
     */
    public function mount(Produto $produto)
    {
        // 1. Vincula o ID do produto da URL diretamente ao wire:model do select
        $this->produto_id = $produto->id;

        // 2. Carrega a lista de produtos (ou apenas o produto atual, dependendo da sua regra)
        $this->produtos = Produto::all();
    }

    public function store()
    {
        $this->validate([
            'produto_id'     => 'required|exists:produtos,id',
            'cor'            => 'nullable|string',
            'textura'        => 'nullable|string',
            'peso'           => 'nullable|numeric',
            'unidade_medida' => 'nullable|string',
            'marca'          => 'nullable|string',
            'descricao'      => 'nullable|string',
        ]);

        // Lógica de salvamento...
        CaracteristicaProduto::create([
            'produto_id'     => $this->produto_id,
            'cor'            => $this->cor,
            'textura'        => $this->textura,
            'peso'           => $this->peso,
            'unidade_medida' => $this->unidade_medida,
            'marca'          => $this->marca,
            'descricao'      => $this->descricao,
        ]);

        session()->flash('success', 'Característica adicionada com sucesso!');

        return redirect()->route('produto.index'); // Ou para onde desejar
    }

    public function render()
    {
        return view('livewire.caracteristica.caracteristica-create');
    }
}
