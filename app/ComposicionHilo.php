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
		'cve_corta_composicion'
	];

	protected $appends = [
		'sumaComposicion'
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function porcetanjeComposicion(){
		return $this->hasMany('App\PorcentajeComposicionHilo', 'id_composicion_hilo', 'id');
	}

	public function getSumaComposicionAttribute(){
		$suma = 0;
		foreach ($this->porcetanjeComposicion as $key => $value) {
			$suma += $value->porcentaje;
		}
		return $suma;
	}


}
