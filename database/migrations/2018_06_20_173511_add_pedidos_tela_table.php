<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPedidosTelaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos_telas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_tela')->unsigned();
            $table->float('kg_programar')->nullable();
            $table->float('piezas')->nullable();
            $table->float('color')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_tela', 'my_id_tela_pedidos_telas');
            $table->foreign('id_tela')->references('id')->on('telas_cliente');
            $table->index('id_user', 'my_id_user_pedidos_telas');
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
        $table->dropForeign([
            'id_user',
            'id_tela',
        ]);
        $table->dropIndex([
            'my_id_tela_pedidos_telas',
            'my_id_user_pedidos_telas',
        ]);
        Schema::dropIfExists('pedidos_telas');
    }
}
