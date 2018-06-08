<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\MaquinasCircularesGrid;
use App\MaquinasCirculares;
use App\Http\Requests\MaquinasCircularesRequest;
use App\Http\Requests\MaquinasCircularesUpdateRequest;

class MaquinasCircularesController extends Controller
{
    public function index(Request $request){
    	$model = MaquinasCirculares::getQuery();
    	$grid = (new MaquinasCircularesGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('maquinascirculares.index');
        return $grid;
    }

    public function create(){
    	return view('maquinascirculares.create');
    }

    public function store(MaquinasCircularesRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
    	$model = MaquinasCirculares::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('maquinascirculares/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('maquinascirculares.show', [
    		'model' => $model
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
    	return view('maquinascirculares.update',[
    		'model' => $model
    	]);
    }

    public function edit($id, MaquinasCircularesRequest $request){
    	$model = $this->findModel($id);
    	$model->agujas = $request->get('agujas');
        $model->alimentadores = $request->get('alimentadores');
        $model->rpm = $request->get('rpm');
        $model->galga = $request->get('galga');
        $model->maquina = $request->get('maquina');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('maquinascirculares/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('maquinascirculares/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = MaquinasCirculares::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
