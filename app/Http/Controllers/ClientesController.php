<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\ClientesGrid;
use App\Clientes;
use App\Http\Requests\ClientesRequest;
use App\Http\Requests\ClientesUpdateRequest;

class ClientesController extends Controller
{
    public function index(Request $request){
    	$model = Clientes::getQuery();
    	$grid = (new ClientesGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('clientes.index');
        return $grid;
    }

    public function create(){
    	return view('clientes.create');
    }

    public function store(ClientesRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
    	$model = Clientes::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('clientes/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('clientes.show', [
    		'model' => $model
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
    	return view('clientes.update',[
    		'model' => $model
    	]);
    }

    public function edit($id, ClientesUpdateRequest $request){
    	$model = $this->findModel($id);
    	$model->nombre = $request->get('nombre');
    	$model->direccion = $request->get('direccion');
    	$model->email = $request->get('email');
    	$model->clave_corta = $request->get('clave_corta');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('clientes/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('clientes/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = Clientes::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }

    public function datos(Request $request) {
        $id = $request->get('id');
        $model = [];
        if (!empty($id)) {
            $model = $this->findModel($id);
        }
        return $model;
    }
}
