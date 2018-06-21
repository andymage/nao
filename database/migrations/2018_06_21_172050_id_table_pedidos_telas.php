<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IdTablePedidosTelas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pedidos_telas', function (Blueprint $table) {
            $table->integer('id_pedido')->unsigned();
            $table->index('id_pedido', 'my_id_pedido_pedidos_telas');
            $table->foreign('id_pedido')->references('id')->on('pedidos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pedidos_telas', function (Blueprint $table) {
            $table->dropForeign([
                'id_pedido',
            ]);
            $table->dropIndex([
                'my_id_pedido_pedidos_telas',
            ]);
        });
    }
}
