<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'proveedores';

    protected $primaryKey = 'id';
	
	protected $fillable = [
		'id_user',
		'nombre',
		'clave_corta',
		'direccion',
		'telefono',
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
