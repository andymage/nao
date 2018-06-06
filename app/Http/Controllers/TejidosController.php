<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\TejidosGrid;
use App\Tejidos;
use App\Http\Requests\TejidosRequest;
use App\Http\Requests\TejidosUpdateRequest;

class TejidosController extends Controller
{
    public function index(Request $request){
    	$model = Tejidos::getQuery();
    	$grid = (new TejidosGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('tejidos.index');
        return $grid;
    }

    public function create(){
    	return view('tejidos.create');
    }

    public function store(TejidosRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
        $data['numero_consecutivo'] = Tejidos::getConsecutivo($request->get('cve_tejido'));
    	$model = Tejidos::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('tejidos/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('tejidos.show', [
    		'model' => $model
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
    	return view('tejidos.update',[
    		'model' => $model
    	]);
    }

    public function edit($id, TejidosRequest $request){
    	$model = $this->findModel($id);
    	$model->tejido = $request->get('tejido');
    	$model->modelo = $request->get('modelo');
        $model->numero_consecutivo = Tejidos::getConsecutivo($request->get('cve_tejido'));
    	$model->cve_tejido = $request->get('cve_tejido');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('tejidos/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('tejidos/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = Tejidos::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
