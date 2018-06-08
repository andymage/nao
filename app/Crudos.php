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
		'nombre',
		'clave_corta',
		'direccion',
		'email',
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
