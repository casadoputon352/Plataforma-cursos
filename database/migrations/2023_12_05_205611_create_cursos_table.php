<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('instrutor');
            $table->longText('descricao');
            $table->string('categoria');
            $table->decimal('preco', 8, 2);
            $table->float('avaliacoes');
            $table->string('video_url');

            $table->string('carga_horaria');
            $table->string('pre_requisitos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
