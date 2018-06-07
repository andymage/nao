<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TelasCliente extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'telas_cliente';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_tejido',
		'id_composicion_hilo',
		'id_textura',
		'diametro',
		'gramaje',
		'descripcion',
	];

	protected $appends = [
		'modeloTela'
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function tejido(){
		return $this->hasOne('App\Tejidos', 'id', 'id_tejido');
	}

	public function composicionHilo(){
		return $this->hasOne('App\ComposicionHilo', 'id', 'id_composicion_hilo');
	}

	public function textura(){
		return $this->hasOne('App\Texturas', 'id', 'id_textura');
	}

	public function getModeloTelaAttribute(){
		$gramaje = str_replace('.', '', $this->gramaje);
		$gramaje = substr($gramaje, 0, 2);
		return $this->tejido->cveCorta . '-' . $this->composicionHilo->cve_corta_composicion . '-' . $this->textura->cve_corta_textura . '-' . $gramaje;
	}
}
