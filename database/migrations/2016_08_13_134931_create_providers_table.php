<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rif', 16);
            $table->string('razon_social', 150);
            $table->string('ciudad')->nullable();
            $table->string('calle')->nullable();
            $table->string('habitacion')->nullable();
            $table->text('direccion')->nullable();
            $table->integer('operadora');
            $table->string('telefono', 10);
            $table->string('correo', 70)->nullable();
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
        Schema::drop('providers');
    }
}
