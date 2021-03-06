<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComposicionHiloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('nombre');
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_user', 'my_id_user_materiales');
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::create('composicion_hilo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->string('cve_corta_composicion')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_user', 'my_id_user_composicion_hilo');
            $table->foreign('id_user')->references('id')->on('users');
        });
        Schema::create('porcentaje_composicion_hilo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_material')->unsigned();
            $table->integer('id_composicion_hilo')->unsigned();
            $table->float('porcentaje');
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_material', 'my_id_porcentaje_material_composicion_hilo');
            $table->foreign('id_material')->references('id')->on('materiales');
            $table->index('id_user', 'my_id_user_porcentaje_composicion_hilo');
            $table->foreign('id_user')->references('id')->on('users');
            $table->index('id_composicion_hilo', 'my_id_composicion_hilo_porcentaje_composicion_hilo');
            $table->foreign('id_composicion_hilo')->references('id')->on('composicion_hilo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('porcentaje_composicion_hilo', function (Blueprint $table) {
            $table->dropForeign([
                'id_user',
                'id_material',
                'id_composicion_hilo'
            ]);
            $table->dropIndex([
                'my_id_porcentaje_material_composicion_hilo',
                'my_id_user_porcentaje_composicion_hilo',
                'my_id_composicion_hilo_porcentaje_composicion_hilo'
            ]);
        });
        Schema::table('composicion_hilo', function (Blueprint $table) {
            $table->dropForeign([
                'id_user',
            ]);
            $table->dropIndex([
                'my_id_user_composicion_hilo',
            ]);
        });
        
        Schema::dropIfExists('porcentaje_composicion_hilo');
        Schema::dropIfExists('composicion_hilo');

        Schema::table('materiales', function (Blueprint $table) {
            $table->dropForeign([
                'id_user',
            ]);
            $table->dropIndex([
                'my_id_user_materiales'
            ]);
        });
        Schema::dropIfExists('materiales');
        
    }
}
