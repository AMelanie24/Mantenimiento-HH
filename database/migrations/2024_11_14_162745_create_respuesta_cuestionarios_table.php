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
        Schema::create('respuesta_cuestionarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuario_id');  // Relación con el usuario que completó el cuestionario
            $table->json('respuestas');                // Almacenará las respuestas de las preguntas en formato JSON
            $table->integer('puntuacion_total');       // Puntuación total calculada
            $table->timestamps();
            
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('respuesta_cuestionarios');
    }
};
