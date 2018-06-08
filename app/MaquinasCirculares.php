<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaquinasCirculares extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'maquinas_circulares';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'agujas',
		'alimentadores',
		'rpm',
		'galga',
		'maquina',
	];

	protected $appends = [
		'constanteMaquina'
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function getConstanteMaquinaAttribute(){
		return (((($this->agujas * $this->alimentadores * $this->rpm * 0.0019841) * .8) / 2.2) / 2.54);
	}
}
