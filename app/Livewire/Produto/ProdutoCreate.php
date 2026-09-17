<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoCreate extends Component
{

    public $nome;
    public $valor;
    public $qtd_estoque;
    public $qtd_minima;
    public $data_valid;

    public function store(){
        Produto::create([
            'nome' => $this->nome,
            'valor' => $this->valor,
            'qtd_estoque' => $this->qtd_estoque,
            'qtd_minima' => $this->qtd_minima, 
            'data_valid' => $this->data_valid,           
        ]);

        session()->flash('success','Cadastrado');
        return redirect()->route('produto.index');
    }

    public function render()
    {
        return view('livewire.produto.produto-create');
    }
}   