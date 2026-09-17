<?php

namespace App\Livewire\Movimentacao;

use App\Models\Movimentacao;
use App\Models\Produto;
use Livewire\Component;

class MovimentacaoCreate extends Component
{
    public $produtos;
    public $idProdutoSelecionado;
    public $tipo = 'saida';
    public $quantidade;
    public $data_movimentacao;
    public $alertaEstoqueBaixo;

    public function mount()
    {
        $this->produtos = Produto::orderBy('nome')->get();
        $this->data_movimentacao = now()->format('Y-m-d');
    }

    public function store()
    {
        $produto = Produto::find($this->idProdutoSelecionado);
        if($produto->qtd_estoque < $this->quantidade && $this->tipo == 'saida'){
            $this->addError('quantidade', 'qunatidade em estoque insuficiente');
            return;
        }

        // Entrada e saida de estoque atualizar
        if ($this->tipo == "entrada") {
            //$produto->qtd_estoque = $produto->qtd_estoque + $this->quantidade;
            $produto->qtd_estoque += $this->quantidade;
            //$produto->increment('qtd_estoque', $this->quantidade);
        } else {
            //$produto->qtd_estoque = $produto->qtd_estoque - $this->quantidade;
            $produto->qtd_estoque -= $this->quantidade;
            //$produto->decrement('qtd_estoque', $this->quantidade);
        }

        //Registrar Movimentação
        Movimentacao::create([
            'quantidade' => $this->quantidade,
            'data_movimentacao' => $this->data_movimentacao,
            'tipo' => $this->tipo,
            'produto_id' => $this->idProdutoSelecionado,
            'user_id' => 1

        ]);

        $produto->update();

        $produto->refresh();
        if ($produto->qtd_estoque < $produto->qtd_minima) {
            $this->alertaEstoqueBaixo = "ALERTA: Estoque baixo para
                {$produto->nome}. Quantidade Atual:{$produto->qtd_estoque}";
        } else {
            $this->alertaEstoqueBaixo = "";
        }

        session()->flash('message', 'Movimentação registrada com sucesso');

        $this->reset(['quantidade', 'tipo']);
        $this->produtos = Produto::orderBy('nome')->get();
    }

    public function render()
    {
        return view('livewire.movimentacao.movimentacao-create');
    }
}