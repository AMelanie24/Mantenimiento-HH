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
       Schema::create('usuarios_roles', function (Blueprint $table) {
    $table->unsignedBigInteger('usuario_id');
    $table->unsignedBigInteger('rol_id');

    // Clave primaria compuesta
    $table->primary(['usuario_id', 'rol_id']);

    // Llaves foráneas
    $table->foreign('usuario_id')->references('id')->on('users')->onDelete('cascade');
    $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios_roles');
    }
};
