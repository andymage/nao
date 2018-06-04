<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\HilosGrid;
use App\Hilos;
use App\Http\Requests\HilosRequest;
use App\Helper;
use App\Materiales;
use App\Http\Requests\ComposicionHiloRequest;
use App\ComposicionHilo;

class HilosController extends Controller
{
    public function index(Request $request){
    	$model = Hilos::getQuery();
    	$grid = (new HilosGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('hilos.index');
        return $grid;
    }

    public function create(){
    	return view('hilos.create');
    }

    public function store(HilosRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
    	$model = Hilos::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('hilos/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
        $material = Helper::arrayHelperSelect(Materiales::pluck('nombre', 'id')->toArray());
    	return view('hilos.show', [
    		'model' => $model,
            'material' => $material
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
    	return view('hilos.update',[
    		'model' => $model
    	]);
    }

    public function edit($id, HilosRequest $request){
    	$model = $this->findModel($id);
        $model->calibre = $request->get('calibre');
        $model->cve_corta_hilo = $request->get('cve_corta_hilo');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('hilos/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('hilos/show/' . $model->id);
    }

    public function createComposicion($id_hilo, ComposicionHiloRequest $request){
        $data = $request->all();
        $data['id_user'] = $request->user()->id;
        $data['id_hilo'] = $id_hilo;
        $model = ComposicionHilo::create($data);
        flash('¡Agregado Correctamente!')->success();
        return redirect('hilos/show/' . $model->id_hilo);
    }

    protected function findModel($id)
    {
        if (($model = Hilos::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
