<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hilos extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'hilos';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'calibre',
		'cve_corta_hilo',
	];

	protected $appends = [
		'sumaComposicion'
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function composicionHilo(){
		return $this->hasMany('App\ComposicionHilo', 'id_hilo', 'id');
	}

	public function getSumaComposicionAttribute(){
		$suma = 0;
		foreach ($this->composicionHilo as $key => $value) {
			$suma += $value->porcentaje;
		}
		return $suma;
	}
}
