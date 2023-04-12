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
        Schema::table('colaborador', function (Blueprint $table) {
         
            $table->foreign('colaborador_puesto')->references('id')->on('puesto')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('banco', function (Blueprint $table) {
         
            $table->foreign('banco_tipoCuenta')->references('id')->on('cuenta')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('banco_tipoMoneda')->references('id')->on('moneda')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('usuario', function (Blueprint $table) {
         
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('token', function (Blueprint $table) {
         
            $table->foreign('id_usuario')->references('id')->on('usuario')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('detallebanco', function (Blueprint $table) {
         
            $table->foreign('id_banco')->references('id')->on('banco')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('id_tipoTransaccion')->references('id')->on('transaccion')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('venta', function (Blueprint $table) {
         
            $table->foreign('cliente_id')->references('id')->on('cliente')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('usuario_id')->references('id')->on('usuario')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

        Schema::table('detalleventa', function (Blueprint $table) {
         
            $table->foreign('venta_id')->references('id')->on('venta')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('producto_id')->references('id')->on('producto')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('estado')->references('id')->on('estado')->onDelete('Cascade')->onUpdate('Cascade');

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foreighkeys');
    }
};
