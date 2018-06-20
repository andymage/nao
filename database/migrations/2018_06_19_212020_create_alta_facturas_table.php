<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAltaFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();
            $table->integer('id_proveedor')->unsigned();
            $table->integer('id_hilo')->unsigned();
            $table->longText('numero_factura')->nullable();
            $table->float('kg_hilo')->nullable();
            $table->longText('lote_hilo')->nullable();
            $table->longText('consecutivo')->nullable();
            $table->longText('descripcion')->nullable();
            $table->float('precio')->nullable();
            $table->float('importe')->nullable();
            $table->date('fecha');
            $table->dateTime('fecha_alta');
            $table->dateTime('fecha_actualizacion');
            $table->index('id_proveedor', 'my_id_proveedor_facturas');
            $table->foreign('id_proveedor')->references('id')->on('proveedores');
            $table->index('id_user', 'my_id_user_facturas');
            $table->foreign('id_user')->references('id')->on('users');
            $table->index('id_hilo', 'my_id_hilo_facturas');
            $table->foreign('id_hilo')->references('id')->on('hilos');
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
                'id_proveedor',
                'id_hilo',
            ]);
            $table->dropIndex([
                'my_id_proveedor_facturas',
                'my_id_user_facturas',
                'my_id_hilo_facturas',
            ]);
        });
        Schema::dropIfExists('facturas');
    }
}
