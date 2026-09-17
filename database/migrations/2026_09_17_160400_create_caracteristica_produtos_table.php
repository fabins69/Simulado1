<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('caracteristicas_produtos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('produto_id')
                ->constrained('produtos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('cor')->nullable();
            $table->string('textura')->nullable();

            $table->decimal('peso', 10, 3)->nullable();

            $table->enum('unidade_medida', [
                'un',
                'kg',
                'g',
                'mg',
                'l',
                'ml',
                'm',
                'cm',
                'mm',
            ])->nullable();

            $table->string('marca')->nullable();

            $table->text('descricao')->nullable();

            

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('caracteristicas_produtos');
    }
};