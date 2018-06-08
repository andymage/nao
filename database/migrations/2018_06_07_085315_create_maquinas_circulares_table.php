<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaquinasCircularesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquinas_circulares', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('agujas')->nullable();
            $table->integer('alimentadores')->nullable();
            $table->float('rpm')->nullable();
            $table->float('galga')->nullable();
            $table->string('maquina')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_user', 'my_id_user_maquinas_circulares');
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
        Schema::table('maquinas_circulares', function (Blueprint $table) {
            $table->dropForeign([
                'id_user',
            ]);
            $table->dropIndex([
                'my_id_user_maquinas_circulares',
            ]);
        });
        Schema::dropIfExists('maquinas_circulares');
    }
}
