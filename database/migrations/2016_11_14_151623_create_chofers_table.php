<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChofersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('chofer_id')->unsigned()->nullable();//apunta al id del tecnico a asignar
            $table->foreign('chofer_id')->references('id')->on('users');
            $table->integer('cliente_id')->unsigned()->nullable();//apunta al id del tecnico a asignar
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('detalle');
            $table->datetime('fecha_recep');
            $table->datetime('fecha_compromiso');
            $table->string('status');
            $table->timestamps();


            ['chofer_id','detalle','fecha_recep','fecha_compromiso','status'];
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('chofers');
    }
}
