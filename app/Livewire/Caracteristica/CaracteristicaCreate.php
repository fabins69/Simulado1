<?php

namespace App\Livewire\Caracteristica;

use App\Models\CaracteristicaProduto;
use App\Models\Produto;
use Livewire\Component;

class CaracteristicaCreate extends Component
{
    public $produtos;
    public $produto_id;
    public $cor;
    public $textura;
    public $peso;
    public $unidade_medida;
    public $marca;
    public $descricao;

    public function store(){
        CaracteristicaProduto::create([
            'produto_id' => $this->produto_id,
            'cor' => $this->cor,
            'textura' => $this->textura,
            'peso' => $this->peso,
            'unidade_medida' => $this->unidade_medida,
            'marca' => $this->marca,
            'descricao' => $this->descricao,          
        ]);

        session()->flash('success','Cadastrado');
        return redirect()->route('produto.index');
    }

    public function render()
{
    return view('livewire.caracteristica.caracteristica-create', [
        'produtos' => Produto::all() // Certifique-se de enviar os dados aqui
    ]);
}

}
