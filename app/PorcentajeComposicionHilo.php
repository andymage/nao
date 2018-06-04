<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PorcentajeComposicionHilo extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'porcentaje_composicion_hilo';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_material',
		'id_composicion_hilo',
		'porcentaje',
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function hilo(){
		return $this->hasOne('App\Hilos', 'id', 'id_hilo');
	}

	public function material(){
		return $this->hasOne('App\Materiales', 'id', 'id_material');
	}
}
