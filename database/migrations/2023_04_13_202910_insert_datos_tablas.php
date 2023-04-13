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

        DB::table('usuario')->insert([
            ['email'=>'test_fhope@gmail.com','password'=>'test123456','user'=>'test.test','intentos'=>'3', 'confirmacion'=>'0','estado'=>'1']
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
