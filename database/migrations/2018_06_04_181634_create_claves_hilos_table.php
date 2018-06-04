<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClavesHilosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claves_hilos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_hilo')->unsigned();
            $table->integer('id_composicion_hilo')->unsigned();
            $table->integer('id_textura')->unsigned();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_user', 'my_id_user_claves_hilos');
            $table->foreign('id_user')->references('id')->on('users');
            $table->index('id_hilo', 'my_id_hilo_claves_hilos');
            $table->foreign('id_hilo')->references('id')->on('hilos');
            $table->index('id_composicion_hilo', 'my_id_composicion_hilo_claves_hilos');
            $table->foreign('id_composicion_hilo')->references('id')->on('composicion_hilo');
            $table->index('id_textura', 'my_id_textura_claves_hilos');
            $table->foreign('id_textura')->references('id')->on('texturas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('claves_hilos', function (Blueprint $table) {
            $table->dropForeign([
                'id_user',
                'id_hilo',
                'id_composicion_hilo',
                'id_textura',
            ]);
            $table->dropIndex([
                'my_id_user_claves_hilos',
                'my_id_hilo_claves_hilos',
                'my_id_composicion_hilo_claves_hilos',
                'my_id_textura_claves_hilos',
            ]);
        });
        Schema::dropIfExists('claves_hilos');
    }
}
