<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\FacturasGrid;
use App\Facturas;
use App\Http\Requests\FacturasRequest;
use App\Helper;
use App\Materiales;
use App\Http\Requests\ComposicionHiloRequest;
use App\Proveedores;
use App\Hilos;

class FacturasController extends Controller
{
    public function index(Request $request){
        $array = Helper::getQuery($request->all(), [
            'id' => 'facturas.id',
            'clave_corta' => 'proveedores.clave_corta',
            'cve_corta_hilo' => 'hilos.cve_corta_hilo',
            'numero_factura' => 'facturas.numero_factura',
            'fecha' => 'facturas.fecha',
        ]);
    	$model = Facturas::select([
                'facturas.id as id',
                'proveedores.clave_corta as clave_corta',
                'hilos.cve_corta_hilo as cve_corta_hilo',
                'facturas.numero_factura as numero_factura',
                'facturas.fecha as fecha',
            ])
            ->join('hilos', 'hilos.id', '=', 'facturas.id_hilo')
            ->join('proveedores', 'proveedores.id', '=', 'facturas.id_proveedor')
            ->getQuery();
    	$grid = (new FacturasGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('facturas.index');
        return $grid;
    }

    public function create(){
        $proveedores = Helper::arrayHelperSelect(Proveedores::pluck('nombre', 'id')->toArray());
        $hilos = Helper::arrayHelperSelect(Hilos::pluck('cve_corta_hilo', 'id')->toArray());
    	return view('facturas.create',[
            'proveedores' => $proveedores,
            'hilos' => $hilos,
        ]);
    }

    public function store(FacturasRequest $request){
    	$data = $request->all();
        $data['id_user'] = $request->user()->id;
    	$data['consecutivo'] = Facturas::getConsecutivo();
    	$model = Facturas::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('facturas/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
        $material = Helper::arrayHelperSelect(Materiales::pluck('nombre', 'id')->toArray());
    	return view('facturas.show', [
    		'model' => $model,
            'material' => $material
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
        $proveedores = Helper::arrayHelperSelect(Proveedores::pluck('nombre', 'id')->toArray());
        $hilos = Helper::arrayHelperSelect(Hilos::pluck('cve_corta_hilo', 'id')->toArray());
    	return view('facturas.update',[
    		'model' => $model,
            'proveedores' => $proveedores,
            'hilos' => $hilos,
    	]);
    }

    public function edit($id, FacturasRequest $request){
    	$model = $this->findModel($id);
        $model->id_proveedor = $request->get('id_proveedor');
        $model->id_hilo = $request->get('id_hilo');
        $model->numero_factura = $request->get('numero_factura');
        $model->kg_hilo = $request->get('kg_hilo');
        $model->lote_hilo = $request->get('lote_hilo');
        $model->importe = $request->get('importe');
        $model->fecha = $request->get('fecha');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('facturas/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('facturas/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = Facturas::find($id)) !== null) {
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
            $model['hilo'] = $model->hilo;
        }
        return $model;
    }
}
