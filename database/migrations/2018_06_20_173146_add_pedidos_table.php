<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_cliente')->unsigned();
            $table->date('fecha')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_cliente', 'my_id_cliente_pedidos');
            $table->foreign('id_cliente')->references('id')->on('clientes');
            $table->index('id_user', 'my_id_user_pedidos');
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
            'id_cliente',
        ]);
        $table->dropIndex([
            'my_id_cliente_pedidos',
            'my_id_user_pedidos',
        ]);
        Schema::dropIfExists('pedidos');
    }
}
