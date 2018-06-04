<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\ComposicionHiloGrid;
use App\ComposicionHilo;
use App\Http\Requests\ComposicionHiloRequest;
use App\Helper;
use App\Materiales;
use App\Http\Requests\PorcentajeComposicionHiloRequest;
use App\PorcentajeComposicionHilo;

class ComposicionHiloController extends Controller
{
    public function index(Request $request){
    	$model = ComposicionHilo::getQuery();
    	$grid = (new ComposicionHiloGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('composicionhilo.index');
        return $grid;
    }

    public function create(){
    	return view('composicionhilo.create');
    }

    public function store(ComposicionHiloRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
    	$model = ComposicionHilo::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('composicionhilo/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
        $material = Helper::arrayHelperSelect(Materiales::pluck('nombre', 'id')->toArray());
    	return view('composicionhilo.show', [
    		'model' => $model,
            'material' => $material
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
    	return view('composicionhilo.update',[
    		'model' => $model
    	]);
    }

    public function edit($id, ComposicionHiloRequest $request){
    	$model = $this->findModel($id);
        $model->cve_corta_composicion = $request->get('cve_corta_composicion');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('composicionhilo/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('composicionhilo/show/' . $model->id);
    }

    public function createPorcentaje($id, PorcentajeComposicionHiloRequest $request){
        $data = $request->all();
        $data['id_user'] = $request->user()->id;
        $data['id_composicion_hilo'] = $id;
        $model = PorcentajeComposicionHilo::create($data);
        flash('¡Creado Correctamente!')->success();
        return redirect('composicionhilo/show/' . $model->id_composicion_hilo);
    }

    public function destroyPorcentaje($id){
        $model = PorcentajeComposicionHilo::find($id);
        $id_composicion_hilo = $model->id_composicion_hilo;
        if ($model->delete()) {
            flash('¡Eliminado Correctamente!')->success();
            return redirect('composicionhilo/show/' . $id_composicion_hilo);
        }
        flash('¡Ocurrió un error, inténtalo nuevamente!')->error();
        return redirect('composicionhilo/show/' . $id_composicion_hilo);
    }

    protected function findModel($id)
    {
        if (($model = ComposicionHilo::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
