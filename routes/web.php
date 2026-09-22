<?php

use App\Livewire\Auth\Login;
use App\Livewire\Caracteristica\CaracteristicaCreate;
use App\Livewire\Dashboard\Dashboard;
use App\Livewire\Movimentacao\MovimentacaoCreate;
use App\Livewire\Movimentacao\MovimentacaoIndex;
use App\Livewire\Produto\ProdutoCreate;
use App\Livewire\Produto\ProdutoEdit;
use App\Livewire\Produto\ProdutoIndex;
use Illuminate\Support\Facades\Route;


Route::get('produto/create', ProdutoCreate::class)->name('produto.create');
Route::get('produto/edit/{id}', ProdutoEdit::class)->name('produto.edit');
Route::get('produto', ProdutoIndex::class)->name('produto.index');

Route::get('movimentacao/create', MovimentacaoCreate::class)->name('movimentacao.create');
Route::get('movimentacao', MovimentacaoIndex::class)->name('movimentacao.index');

Route::get('caracteristica/create', CaracteristicaCreate::class)->name('caracteristica.create');

Route::get('/dashboard', Dashboard::class)->name('dashboard');

Route::post('/logout', Login::class)->name('logout');
Route::get('/', Login::class)->name('login');