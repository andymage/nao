<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DevolucionFacturas extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'devolucion_facturas';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_factura',
		'kg_dev',
		'importe',
		'fecha',
		'consecutivo'
	];

	protected $appends = [
		'consecutivoFactura'
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function factura(){
		return $this->hasOne('App\Facturas', 'id', 'id_factura');
	}

	public static function getConsecutivo(){
		$suma = '01';
		$model = self::orderBy('id', 'DESC')->first();
		if (!empty($model)) {
			$suma = $model->consecutivo + 1;
			if (strlen($suma) <= 9) {
				$suma = '0' . $suma;
			}
		}
		return $suma;
	}

	public function getConsecutivoFacturaAttribute(){
		return $this->factura->proveedor->clave_corta . '-' . $this->consecutivo;
	}

}
