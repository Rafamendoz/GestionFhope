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
        DB::table('estado')->insert([
            ['valor' => 'Activo'],
            ['valor' => 'Inactivo']]
        );

        DB::table('users')->insert([
            ['email'=>'test_fhope@gmail.com','password'=>'test123456','user'=>'test.test','intentos'=>'3','estado'=>'1']
            ]
        );

        DB::table('errores')->insert([
            ['codigo_error'=>23000,'descripcion'=>'Los datos ingresados no son permitidos para la solicitud, por favor revisar.']
            ]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
