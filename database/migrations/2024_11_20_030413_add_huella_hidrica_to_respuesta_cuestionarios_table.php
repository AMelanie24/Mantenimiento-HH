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
        Schema::table('respuesta_cuestionarios', function (Blueprint $table) {
            $table->integer('huella_hidrica')->nullable()->after('puntuacion_total'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('respuesta_cuestionarios', function (Blueprint $table) {
            //
        });
    }
};
