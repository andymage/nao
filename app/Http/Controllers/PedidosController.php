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
use Illuminate\Support\Facades\DB;
use App\TelasCliente;
use App\PedidosTelas;

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
        DB::beginTransaction();
        try {
        	$model = Pedidos::create($data);
            $datos['Productos'] =  $request->get('Productos');
            $arreglo = [];
            $i = 0;
            foreach ($datos['Productos'] as $key => $value) {
                foreach ($value as $key2 => $value2) {
                    $arreglo[$key2][$key] = $value2;
                }
                $i++;
            }
            foreach ($arreglo as $key => $value) {
                $datos_w = $value;
                $datos_w['id_user'] = $request->user()->id;
                $datos_w['id_pedido'] = $model->id;
                $model_datos = PedidosTelas::create($datos_w);
            }
            DB::commit();
        	flash('¡Creado Correctamente!')->success();
            return redirect('pedidos/show/' . $model->id);
        } catch (Exception $e) {
            DB::rollback();
            flash('¡Ocurrió un Error!')->error();
            return redirect('pedidos/index');
        }
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('pedidos.show', [
    		'model' => $model,
    	]);
    }

   /* public function update($id){
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
    }*/

    protected function findModel($id)
    {
        if (($model = Pedidos::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
