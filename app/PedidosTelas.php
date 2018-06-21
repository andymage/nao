<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidosTelas extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'pedidos_telas';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'id_tela',
		'kg_programar',
		'piezas',
		'color',
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function tela(){
		return $this->hasOne('App\TelasCliente', 'id', 'id_tela');
	}
	
}
