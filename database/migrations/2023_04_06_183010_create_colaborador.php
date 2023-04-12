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
        Schema::create('colaborador', function (Blueprint $table) {
            $table->id();
            $table->string('colaborador_nombres');
            $table->string('colaborador_apellidos');
            $table->string('colaborador_DNI');
            $table->unsignedBigInteger('colaborador_puesto');
            $table->unsignedBigInteger('colaborador_idusuario');
            $table->unsignedBigInteger('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colaborador');
    }
};
