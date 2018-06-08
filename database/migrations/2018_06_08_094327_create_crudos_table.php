<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrudosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crudos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_clave_hilo')->unsigned();
            $table->integer('id_maquina_circular')->unsigned();
            $table->float('gramaje')->nullable();
            $table->string('lm')->nullable();
            $table->string('draw')->nullable();
            $table->float('kg_rollo')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_user', 'my_id_user_crudos');
            $table->foreign('id_user')->references('id')->on('users');
            $table->index('id_clave_hilo', 'my_id_clave_hilo_crudos');
            $table->foreign('id_clave_hilo')->references('id')->on('claves_hilos');
            $table->index('id_maquina_circular', 'my_id_maquina_circular_crudos');
            $table->foreign('id_maquina_circular')->references('id')->on('maquinas_circulares');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('crudos', function (Blueprint $table) {
            $table->dropForeign([
                'id_user',
                'id_clave_hilo',
                'id_maquina_circular',
            ]);
            $table->dropIndex([
                'my_id_user_crudos',
                'my_id_clave_hilo_crudos',
                'my_id_maquina_circular_crudos',
            ]);
        });
        Schema::dropIfExists('crudos');
    }
}
