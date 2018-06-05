<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClavesHilos extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'claves_hilos';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_hilo',
		'id_composicion_hilo',
		'id_textura',
	];

	protected $appends = [
		'cveCortaLibre'
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function hilo(){
		return $this->hasOne('App\Hilos', 'id', 'id_hilo');
	}

	public function composicionHilo(){
		return $this->hasOne('App\ComposicionHilo', 'id', 'id_composicion_hilo');
	}

	public function textura(){
		return $this->hasOne('App\Texturas', 'id', 'id_textura');
	}

	public function getCveCortaLibreAttribute(){
		return $this->hilo->cve_corta_hilo . $this->composicionHilo->cve_corta_composicion . $this->textura->cve_corta_textura;
	}
}
