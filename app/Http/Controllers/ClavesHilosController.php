<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\ClavesHilosGrid;
use App\ClavesHilos;
use App\Http\Requests\ClavesHilosRequest;
use App\Helper;
use App\Materiales;
use App\Http\Requests\ComposicionHiloRequest;
use App\ComposicionHilo;
use App\Hilos;
use App\Texturas;
use Illuminate\Support\Facades\DB;

class ClavesHilosController extends Controller
{
    public function index(Request $request){
        $array = Helper::getQuery($request->all(), [
            'id' => 'claves_hilos.id',
            'calibre' => 'calibre',
            'suma' => 'suma',
            'textura' => 'textura',
        ]);
    	$model = ClavesHilos::select([
                'claves_hilos.id as id',
                'calibre',
                DB::raw('(select sum(porcentaje) from porcentaje_composicion_hilo where composicion_hilo.id = porcentaje_composicion_hilo.id_composicion_hilo) as suma'),
                'textura'
            ])
            ->join('texturas', 'texturas.id', '=', 'claves_hilos.id_textura')
            ->join('hilos', 'hilos.id', '=', 'claves_hilos.id_hilo')
            ->join('composicion_hilo', 'composicion_hilo.id', '=', 'claves_hilos.id_composicion_hilo')
            ->where($array)
            ->getQuery();
    	$grid = (new ClavesHilosGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('claveshilos.index');
        return $grid;
    }

    public function create(){
        $composicionhilo = Helper::arrayHelperSelect(ComposicionHilo::pluck('cve_corta_composicion', 'id')->toArray());
        $hilos = Helper::arrayHelperSelect(Hilos::pluck('cve_corta_hilo', 'id')->toArray());
        $texturas = Helper::arrayHelperSelect(Texturas::pluck('cve_corta_textura', 'id')->toArray());
    	return view('claveshilos.create',[
            'composicionhilo' => $composicionhilo,
            'hilos' => $hilos,
            'texturas' => $texturas,
        ]);
    }

    public function store(ClavesHilosRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
    	$model = ClavesHilos::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('claveshilos/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('claveshilos.show', [
    		'model' => $model,
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
        $composicionhilo = Helper::arrayHelperSelect(ComposicionHilo::pluck('cve_corta_composicion', 'id')->toArray());
        $hilos = Helper::arrayHelperSelect(Hilos::pluck('cve_corta_hilo', 'id')->toArray());
        $texturas = Helper::arrayHelperSelect(Texturas::pluck('cve_corta_textura', 'id')->toArray());
    	return view('claveshilos.update',[
    		'model' => $model,
            'composicionhilo' => $composicionhilo,
            'hilos' => $hilos,
            'texturas' => $texturas,
    	]);
    }

    public function edit($id, ClavesHilosRequest $request){
    	$model = $this->findModel($id);
        $model->id_hilo = $request->get('id_hilo');
        $model->id_composicion_hilo = $request->get('id_composicion_hilo');
        $model->id_textura = $request->get('id_textura');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('claveshilos/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('claveshilos/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = ClavesHilos::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
