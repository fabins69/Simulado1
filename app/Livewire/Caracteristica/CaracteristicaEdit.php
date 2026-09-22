<?php

namespace App\Livewire\Caracteristica;

use Livewire\Component;
use App\Models\Produto;

use App\Models\CaracteristicaProduto;

class CaracteristicaEdit extends Component
{
    // Objeto principal para persistência
    public CaracteristicaProduto $caracteristica;

    // Propriedades espelhadas do formulário (wire:model)
    public $produto_id;
    public $cor;
    public $textura;
    public $peso;
    public $unidade_medida;
    public $marca;
    public $descricao;
    
    // Lista de produtos para carregar no select
    public $produtos = [];

    /**
     * O Livewire mapeia automaticamente a Caracteristica pelo ID da URL
     */
    public function mount(CaracteristicaProduto $caracteristica)
    {
        $this->caracteristica = $caracteristica;

        // Preenche as propriedades com os valores atuais do banco de dados
        $this->produto_id     = $caracteristica->produto_id;
        $this->cor            = $caracteristica->cor;
        $this->textura        = $caracteristica->textura;
        $this->peso           = $caracteristica->peso;
        $this->unidade_medida = $caracteristica->unidade_medida;
        $this->marca          = $caracteristica->marca;
        $this->descricao      = $caracteristica->descricao;

        // Carrega todos os produtos para o Select Box
        $this->produtos = Produto::all();
    }

    public function update()
    {
        $this->validate([
            'produto_id'     => 'required|exists:produtos,id',
            'cor'            => 'nullable|string|max:255',
            'textura'        => 'nullable|string|max:255',
            'peso'           => 'nullable|numeric',
            'unidade_medida' => 'nullable|string',
            'marca'          => 'nullable|string|max:255',
            'descricao'      => 'nullable|string',
        ]);

        // Atualiza o registro no banco com os novos inputs do formulário
        $this->caracteristica->update([
            'produto_id'     => $this->produto_id,
            'cor'            => $this->cor,
            'textura'        => $this->textura,
            'peso'           => $this->peso,
            'unidade_medida' => $this->unidade_medida,
            'marca'          => $this->marca,
            'descricao'      => $this->descricao,
        ]);

        session()->flash('success', 'Característica atualizada com sucesso!');

        // Redireciona de volta para a listagem (Index)
        return redirect()->route('caracteristica.index');
    }

    public function render()
    {
        return view('livewire.caracteristica.caracteristica-edit');
    }
}
