<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\MaterialesGrid;
use App\Materiales;
use App\Http\Requests\MaterialesRequest;

class MaterialesController extends Controller
{
    public function index(Request $request){
    	$model = Materiales::getQuery();
    	$grid = (new MaterialesGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('materiales.index');
        return $grid;
    }

    public function create(){
    	return view('materiales.create');
    }

    public function store(MaterialesRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
    	$model = Materiales::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('materiales/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('materiales.show', [
    		'model' => $model
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
    	return view('materiales.update',[
    		'model' => $model
    	]);
    }

    public function edit($id, MaterialesRequest $request){
    	$model = $this->findModel($id);
    	$model->nombre = $request->get('nombre');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('materiales/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('materiales/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = Materiales::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
