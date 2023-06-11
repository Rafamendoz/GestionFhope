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
        Schema::create('detallebanco', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_banco');
            $table->unsignedBigInteger('id_tipoTransaccion');
            $table->float('monto');
            $table->string('descripcion');
            $table->unsignedBigInteger('estado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallebanco');
    }
};
