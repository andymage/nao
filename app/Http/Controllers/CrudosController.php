<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\CrudosGrid;
use App\Crudos;
use App\ClavesHilos;
use App\Helper;
use App\Http\Requests\CrudosRequest;
use App\Http\Requests\CrudosUpdateRequest;
use App\MaquinasCirculares;

class CrudosController extends Controller
{
    public function index(Request $request){
    	$model = Crudos::getQuery();
    	$grid = (new CrudosGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('crudos.index');
        return $grid;
    }

    public function create(){
        $claveshilos = ClavesHilos::get();
        $clave = [];
        foreach ($claveshilos as $key => $value) {
            $clave[$value->id] = $value->cveCortaLibre;
        }
        $clave = Helper::arrayHelperSelect($clave);
    	return view('crudos.create',[
            'clave' => $clave
        ]);
    }

    public function store(CrudosRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
    	$model = Crudos::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('crudos/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('crudos.show', [
    		'model' => $model
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
    	return view('crudos.update',[
    		'model' => $model
    	]);
    }

    public function edit($id, CrudosUpdateRequest $request){
    	$model = $this->findModel($id);
    	$model->nombre = $request->get('nombre');
    	$model->direccion = $request->get('direccion');
    	$model->email = $request->get('email');
    	$model->clave_corta = $request->get('clave_corta');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('crudos/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('crudos/show/' . $model->id);
    }

    public function datos(){
        $id = $request->get('id');
        $model = MaquinasCirculares::where([
            ['agujas', '=',$id]
        ])
        ->get();
        return $model;
    }

    protected function findModel($id)
    {
        if (($model = Crudos::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
