<?php

namespace App;

class Helper
{

	const CABECERA = '<ol class="breadcrumb">';
	const CABECERA_FIN = '</ol>';
	const APERTURA = '<li>';
	const CIERRE = '</li>';


	/**
	 * Generación de breadcrumbs
	 * @param array
	 * @return html|string
	 */
	public static function ArrayHelper($array, $keys, $keys1, $band = 0){
		$armado = [];
		if ($band == 1) {
			$armado = [NULL => 'Seleccione'];
		}
		/*foreach ($array as $key) {
			$armado[$key[$keys]] = $key[$keys1];
		}*/
		$armado = $armado + $array;
		return $armado;
	}

	/**
	 * Generación de select2
	 * @param array
	 * @return html|string
	 */
	public static function arrayHelperSelect($array){
		if (is_array($array)) {
			return [NULL => 'Seleccione'] + $array;
		}
		return $array;
	}

	/**
	 * Agrega archivo a carpeta especificada
	 */
	public static function uploadFile($file, $folder, $name){
      	$file->move($folder, $name);
	}

	public static function select($array){
		$array = [
			NULL => 'Seleccione'
		] + $array;
		return $array;
	}

	public static function getQuery($array, $headers = []) {
		$response = [];
		foreach ($array as $key => $value) {
			if (!empty($value)) {
				if ($key != 'page' and $key != 'export') {
					if (!empty($headers)) {
						$response[] = [$headers[$key], 'like', '%' . $value . '%'];
					}
					else{
						$response[] = [$key, 'like', '%' . $value . '%'];
					}
				}
			}
		}
		return $response;
	}

	/**
	 * Generación de breadcrumbs
	 * @param array
	 * @return html|string
	 */
	public static function breadCrumbs($array){
		$crumbs = self::CABECERA . '<li>
            <i class="fa fa-home"></i>
            <a href="' . url('home') . '">Inicio</a>
        </li>';
        $cuenta = count($array);
        $i = 1;
		foreach ($array as $key => $value) {
			$crumbs .= self::APERTURA;
			$action = \Html::link($value[0], $value[1]);
			$crumbs .=  $action;
			$crumbs .= self::CIERRE;
			$i++;
		}
		$crumbs .= self::CABECERA_FIN;
		return $crumbs;
	}
}