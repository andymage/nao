<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAltaTejidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tejidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('tejido')->nullable();
            $table->string('modelo')->nullable();
            $table->string('cve_tejido')->nullable();
            $table->string('numero_consecutivo')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');

            $table->index('id_user', 'my_id_user_tejidos');
            $table->foreign('id_user')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tejidos');
    }
}
