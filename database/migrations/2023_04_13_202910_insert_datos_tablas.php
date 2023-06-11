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
        $contra =   Hash::make('admin12345');

        DB::table('users')->insert([
          ['email'=>"admin@fhope.online",'password'=>$contra,'user'=>'admin','intentos'=>100,'estado'=>1]

            ]
        );

        DB::table('errores')->insert([
            ['codigo_error'=>23000,'descripcion'=>'Los datos ingresados no son permitidos para la solicitud, por favor revisar.']
            ,['codigo_error'=>404,'descripcion'=>'El registro solicitado no fue encontrado porque no existe.']

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
