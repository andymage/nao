<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\TelasClienteGrid;
use App\TelasCliente;
use App\Http\Requests\TelasClienteRequest;
use App\Http\Requests\TelasClienteUpdateRequest;

class TelasClienteController extends Controller
{
    public function index(Request $request){
    	$model = TelasCliente::getQuery();
    	$grid = (new TelasClienteGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('telascliente.index');
        return $grid;
    }

    public function create(){
    	return view('telascliente.create');
    }

    public function store(TelasClienteRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
    	$model = TelasCliente::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('telascliente/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('telascliente.show', [
    		'model' => $model
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
    	return view('telascliente.update',[
    		'model' => $model
    	]);
    }

    public function edit($id, TelasClienteRequest $request){
    	$model = $this->findModel($id);
    	$model->nombre = $request->get('nombre');
    	$model->direccion = $request->get('direccion');
    	$model->email = $request->get('email');
    	$model->clave_corta = $request->get('clave_corta');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('telascliente/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('telascliente/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = TelasCliente::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
