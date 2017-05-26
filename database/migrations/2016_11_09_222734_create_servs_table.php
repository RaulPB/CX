<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tecnico_id')->unsigned()->nullable();//apunta al id del tecnico a asignar
            $table->foreign('tecnico_id')->references('id')->on('users');
            $table->integer('cliente_id')->unsigned()->nullable();//apunta al id del tecnico a asignar
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('detalle');
            $table->datetime('fecha_recep');
            $table->datetime('fecha_compromiso');
            $table->string('costo');
            $table->string('status');
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
        Schema::drop('servs');
    }
}
