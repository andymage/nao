<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crudos extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'crudos';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_clave_hilo',
		'id_maquina_circular',
		'gramaje',
		'lm',
		'draw',
		'kg_rollo',
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function claveHilo(){
		return $this->hasOne('App\ClavesHilos', 'id', 'id_clave_hilo');
	}

	public function maquinaCircular(){
		return $this->hasOne('App\MaquinasCirculares', 'id', 'id_maquina_circular');
	}
}
