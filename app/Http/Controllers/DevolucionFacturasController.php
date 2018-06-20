<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\DevolucionFacturasGrid;
use App\DevolucionFacturas;
use App\Http\Requests\DevolucionFacturasRequest;
use App\Helper;
use App\Materiales;
use App\Http\Requests\ComposicionHiloRequest;
use App\Proveedores;
use App\Facturas;
use App\Hilos;

class DevolucionFacturasController extends Controller
{
    public function index(Request $request){
        $array = Helper::getQuery($request->all(), [
            'id' => 'devolucion_facturas.id',
            'clave_corta' => 'proveedores.clave_corta',
            'cve_corta_hilo' => 'hilos.cve_corta_hilo',
            'numero_factura' => 'facturas.numero_factura',
            'fecha' => 'devolucion_facturas.fecha',
        ]);
    	$model = DevolucionFacturas::select([
                'devolucion_facturas.id as id',
                'proveedores.clave_corta as clave_corta',
                'hilos.cve_corta_hilo as cve_corta_hilo',
                'facturas.numero_factura as numero_factura',
                'facturas.fecha as fecha',
            ])
            ->join('facturas', 'facturas.id', '=', 'devolucion_facturas.id_factura')
            ->join('proveedores', 'proveedores.id', '=', 'facturas.id_proveedor')
            ->join('hilos', 'hilos.id', '=', 'facturas.id_hilo')
            ->getQuery();
    	$grid = (new DevolucionFacturasGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('devolucionfacturas.index');
        return $grid;
    }

    public function create(){
        $facturas = Helper::arrayHelperSelect(Facturas::pluck('numero_factura', 'id')->toArray());
    	return view('devolucionfacturas.create',[
            'facturas' => $facturas,
        ]);
    }

    public function store(DevolucionFacturasRequest $request){
    	$data = $request->all();
        $data['id_user'] = $request->user()->id;
    	$data['consecutivo'] = DevolucionFacturas::getConsecutivo();
    	$model = DevolucionFacturas::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('devolucionfacturas/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('devolucionfacturas.show', [
    		'model' => $model,
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
        $facturas = Helper::arrayHelperSelect(Facturas::pluck('numero_factura', 'id')->toArray());
    	return view('devolucionfacturas.update',[
    		'model' => $model,
            'facturas' => $facturas,
    	]);
    }

    public function edit($id, DevolucionFacturasRequest $request){
    	$model = $this->findModel($id);
        $model->id_factura = $request->get('id_factura');
        $model->kg_dev = $request->get('kg_dev');
        $model->importe = $request->get('importe');
        $model->fecha = $request->get('fecha');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('devolucionfacturas/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('devolucionfacturas/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = DevolucionFacturas::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
