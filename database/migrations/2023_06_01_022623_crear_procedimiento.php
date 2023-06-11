<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $procedureVentaById = "
        CREATE procedure ObtenerCabeceraVenta (IN id_venta INT )
        BEGIN 
            SELECT 
            v.id, v.cliente_id, c.cliente_nom, u.user, v.direccionEnvio, v.total, DATE(v.created_at) as 'date', DATE_FORMAT(v.created_at, \"%H:%i:%S\" ) as 'hour'
            FROM venta v
            INNER JOIN cliente c on c.id = v.cliente_id
            INNER JOIN users u on u.id = v.usuario_id
            WHERE v.id = id_venta and v.estado=1;
        END
        ";

        $procedureVentas = "
        CREATE procedure ObtenerCabeceraVentas ()
        BEGIN 
            SELECT 
            v.id, v.cliente_id, c.cliente_nom, u.user, v.direccionEnvio, v.total, DATE(v.created_at) as 'date', DATE_FORMAT(v.created_at, \"%H:%i:%S\" ) as 'hour'
            FROM venta v
            INNER JOIN cliente c on c.id = v.cliente_id
            INNER JOIN users u on u.id = v.usuario_id
            WHERE v.estado = 1;
        END
        ";

        DB::unprepared($procedureVentaById);
        DB::unprepared($procedureVentas);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $rollback_procedureVentaById = "DROP PROCEDURE IF EXISTS ObtenerCabeceraVenta";
        DB::unprepared($rollback_procedureVentaById);
        
        $rollback_procedureVentas = "DROP PROCEDURE IF EXISTS ObtenerCabeceraVentas";
        DB::unprepared($rollback_procedureVentaById);
    }
};
