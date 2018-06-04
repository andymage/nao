<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComposicionHilo extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'composicion_hilo';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_hilo',
		'id_material',
		'porcentaje',
		'cve_corta_composicion'
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
