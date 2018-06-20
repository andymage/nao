<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDevolucionFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolucion_facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_factura')->unsigned();
            $table->float('kg_dev')->nullable();
            $table->float('importe')->nullable();
            $table->date('fecha')->nullable();
            $table->longText('consecutivo')->nullable();
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_factura', 'my_id_factura_devolucion_facturas');
            $table->foreign('id_factura')->references('id')->on('facturas');
            $table->index('id_user', 'my_id_user_devolucion_facturas');
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
        Schema::table('crudos', function (Blueprint $table) {
            $table->dropForeign([
                'id_user',
                'id_factura',
            ]);
            $table->dropIndex([
                'my_id_factura_devolucion_facturas',
                'my_id_user_devolucion_facturas',
            ]);
        });
        Schema::dropIfExists('devolucion_facturas');
    }
}
