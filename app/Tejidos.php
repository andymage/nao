<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tejidos extends Model
{
    const CREATED_AT = 'fecha_alta';
	const UPDATED_AT = 'fecha_actualizacion';

	protected $table = 'tejidos';

    protected $primaryKey = 'id';

	protected $fillable = [
		'id_user',
		'tejido',
		'modelo',
		'cve_tejido',
		'numero_consecutivo',
	];

	protected $appends = [
		'cveCorta'
	];

	public function user(){
		return $this->hasOne('App\User', 'id', 'id_user');
	}

	public function getCveCortaAttribute(){
		return $this->cve_tejido . '-' . $this->numero_consecutivo;
	}

	public static function getConsecutivo($cve_tejido){
		$suma = '01';
		$model = self::where([
			['cve_tejido', '=', $cve_tejido]
		])
		->orderBy('id', 'DESC')
		->first();
		if (!empty($model)) {
			$suma = $model->numero_consecutivo + 1;
			if (strlen($suma) <= 9) {
				$suma = '0' . $suma;
			}
		}
		return $suma;
	}
}
