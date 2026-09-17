<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'valor',
        'qtd_estoque',
        'qtd_minima',
        'data_valid'
    ];
    public function movimentacoes(): HasMany
    {
        return $this->hasMany(Movimentacao::class);
    }
    public function caracteristicas()
{
    return $this->hasMany(CaracteristicaProduto::class);
}
}