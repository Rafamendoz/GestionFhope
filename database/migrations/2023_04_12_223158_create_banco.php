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
        Schema::create('banco', function (Blueprint $table) {
            $table->id();
            $table->string('banco_cuenta');
            $table->string('banco_nombre');
            $table->unsignedBigInteger('banco_tipoCuenta');
            $table->unsignedBigInteger('banco_tipoMoneda');
            $table->float('banco_total');
            $table->unsignedBigInteger('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banco');
    }
};
