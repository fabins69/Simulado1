<?php

namespace App\Livewire\Caracteristica;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\CaracteristicaProduto; // Ajuste para o nome real do seu Model

class CaracteristicaIndex extends Component
{
    use WithPagination;

    // Define o tema de paginação para o Bootstrap
    protected $paginationTheme = 'bootstrap';

    // Propriedade para a barra de busca
    public $search = '';

    /**
     * Reseta a paginação sempre que o termo de busca mudar
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Deleta uma característica do banco de dados
     */
    public function delete($id)
    {
        try {
            $caracteristica = CaracteristicaProduto::findOrFail($id);
            $caracteristica->delete();

            session()->flash('success', 'Característica excluída com sucesso!');
        } catch (\Exception $e) {
            session()->flash('error', 'Erro ao tentar excluir a característica.');
        }
    }

    public function render()
    {
        $caracteristicas = CaracteristicaProduto::with('produto')
            ->where(function ($query) {
                $query->where('cor', 'like', '%' . $this->search . '%')
                    ->orWhere('marca', 'like', '%' . $this->search . '%')
                    ->orWhere('textura', 'like', '%' . $this->search . '%')
                    ->orWhere('descricao', 'like', '%' . $this->search . '%') // Inclui a descrição na busca
                    ->orWhereHas('produto', function ($q) {
                        $q->where('nome', 'like', '%' . $this->search . '%');
                    });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.caracteristica.caracteristica-index', [
            'caracteristicas' => $caracteristicas
        ]);
    }
}
