<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'facturas';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_proveedor',
		'id_hilo',
		'numero_factura',
		'kg_hilo',
		'lote_hilo',
		'consecutivo',
		'descripcion',
		'precio',
		'importe',
		'fecha',
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function hilo(){
		return $this->hasOne('App\Hilos', 'id', 'id_hilo');
	}

	public function proveedor(){
		return $this->hasOne('App\Proveedores', 'id', 'id_proveedor');
	}

}
