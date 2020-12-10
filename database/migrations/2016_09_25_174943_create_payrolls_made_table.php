<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsMadeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls_made', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('Cascade');
            $table->string('cedula', 20);
            $table->string('nombre_completo', 50);
            $table->string('cargo', 20);
            $table->integer('diasLaborados');
            $table->integer('feriadosDescanso');
            $table->integer('horasExtas');
            $table->float('totalAsignacion', 10,2);
            $table->float('asignacionesExtras', 10,2);
            $table->float('deduccionesExtras', 10,2);
            $table->float('totalCancelar', 20,2);
            $table->float('sso', 10,2);
            $table->float('rpe', 10,2);
            $table->float('rpvh', 10,2);
            $table->float('totalDeducciones', 10,2);
            $table->float('totalNeto', 10,2);
            $table->float('salarioMensual', 10,2);
            $table->float('salarioDiario', 10,2);
            $table->float('unidad_tributaria', 10,2);
            $table->float('monto_cestaticket', 10,2);
            $table->integer('faltas');
            $table->float('descuentoCestaticket', 10,2);
            $table->integer('id_prenomina')->unsigned();
            $table->foreign('id_prenomina')->references('id')->on('payrolls_saved')->onDelete('Cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('payrolls_made');
    }
}
