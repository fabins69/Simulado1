<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CaracteristicaProduto extends Model
{
    use HasFactory;

    protected $table = 'caracteristicas_produtos';

    protected $fillable = [
        'produto_id',
        'cor',
        'textura',
        'peso',
        'unidade_medida',
        'marca',
        'descricao',
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}