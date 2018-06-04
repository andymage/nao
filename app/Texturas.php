<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texturas extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'texturas';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'textura',
		'color',
		'cve_corta_textura'
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}
}
