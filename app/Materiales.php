<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materiales extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'materiales';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'nombre',
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
