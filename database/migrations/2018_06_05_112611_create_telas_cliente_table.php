<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTelasClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('telas_cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_tejido')->unsigned();
            $table->integer('id_composicion_hilo')->unsigned();
            $table->integer('id_textura')->unsigned();
            $table->float('diametro')->nullable();
            $table->float('gramaje')->nullable();
            $table->longText('descripcion')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_user', 'my_id_user_telas_cliente');
            $table->foreign('id_user')->references('id')->on('users');
            $table->index('id_tejido', 'my_id_tejido_telas_cliente');
            $table->foreign('id_tejido')->references('id')->on('tejidos');
            $table->index('id_composicion_hilo', 'my_id_composicion_hilo_telas_cliente');
            $table->foreign('id_composicion_hilo')->references('id')->on('composicion_hilo');
            $table->index('id_textura', 'my_id_textura_telas_cliente');
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
        Schema::table('telas_cliente', function (Blueprint $table) {
            $table->dropForeign([
                'id_user',
                'id_tejido',
                'id_composicion_hilo',
                'id_textura',
            ]);
            $table->dropIndex([
                'my_id_user_telas_cliente',
                'my_id_tejido_telas_cliente',
                'my_id_composicion_hilo_telas_cliente',
                'my_id_textura_telas_cliente',
            ]);
        });
        Schema::dropIfExists('telas_cliente');
    }
}
