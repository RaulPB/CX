<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('proveedor_id')->unsigned()->nullable();//apunta al id del tecnico a asignar
            $table->foreign('proveedor_id')->references('id')->on('proveedors');
            $table->string('precio_prov');
            $table->string('precio_pub');
            $table->string('porcentaje');
            $table->string('stock');
            $table->string('recuerdame');
            $table->string('producto');

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
        Schema::drop('inventarios');
    }
}
