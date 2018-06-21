<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'pedidos';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_cliente',
		'fecha',
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}


	public function cliente(){
		return $this->hasOne('App\Clientes', 'id', 'id_cliente');
	}
	
}
