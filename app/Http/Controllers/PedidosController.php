<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\PedidosGrid;
use App\Pedidos;
use App\Http\Requests\PedidosRequest;
use App\Helper;
use App\Materiales;
use App\Http\Requests\ComposicionHiloRequest;
use App\ComposicionHilo;
use App\Clientes;
use App\TelasCliente;

class PedidosController extends Controller
{
    public function index(Request $request){
    	$model = Pedidos::getQuery();
    	$grid = (new PedidosGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('pedidos.index');
        return $grid;
    }

    public function create(){
        $clientes = Helper::arrayHelperSelect(Clientes::pluck('nombre', 'id')->toArray());
        $telas = Helper::arrayHelperSelect(TelasCliente::pluck('descripcion', 'id')->toArray());
    	return view('pedidos.create',[
            'clientes' => $clientes,
            'telas' => $telas
        ]);
    }

    public function store(PedidosRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
    	$model = Pedidos::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('pedidos/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('pedidos.show', [
    		'model' => $model,
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
    	return view('pedidos.update',[
    		'model' => $model
    	]);
    }

    public function edit($id, PedidosRequest $request){
    	$model = $this->findModel($id);
        $model->calibre = $request->get('calibre');
        $model->cve_corta_hilo = $request->get('cve_corta_hilo');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('pedidos/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('pedidos/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = Pedidos::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
