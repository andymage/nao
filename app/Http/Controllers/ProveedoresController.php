<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\ProveedoresGrid;
use App\Proveedores;
use App\Http\Requests\ProveedoresRequest;
use App\Http\Requests\ProveedoresUpdateRequest;

class ProveedoresController extends Controller
{
    public function index(Request $request){
    	$model = Proveedores::getQuery();
    	$grid = (new ProveedoresGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('proveedores.index');
        return $grid;
    }

    public function create(){
        return view('proveedores.create');
    }

    public function show($id){
        $model = $this->findModel($id);
        return view('proveedores.show',[
            'model' => $model
        ]);
    }

    public function update($id){
        $model = $this->findModel($id);
        return view('proveedores.update',[
            'model' => $model
        ]);
    }

    public function edit($id, ProveedoresUpdateRequest $request){
        $model = $this->findModel($id);
        $model->telefono = $request->get('telefono');
        $model->direccion = $request->get('direccion');
        $model->nombre = $request->get('nombre');
        $model->clave_corta = $request->get('clave_corta');
        if ($model->save()) {
            flash('Actualizado Correctamente!')->success();
            return redirect('proveedores/show/' . $model->id);
        }
        flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('proveedores/show/' . $model->id);
    }

    public function store(ProveedoresRequest $request){
        $data = $request->all();
        $data['id_user'] = $request->user()->id;
        $model = Proveedores::create($data);
        flash('¡Creado Correctamente!')->success();
        return redirect('proveedores/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = Proveedores::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }

    public function datos(Request $request){
        $id = $request->get('id');
        $model = [];
        if (!empty($id)) {
            $model = $this->findModel($id);
        }
        return $model;
    }
}
