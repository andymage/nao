<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\TelasClienteGrid;
use App\TelasCliente;
use App\ComposicionHilo;
use App\Tejidos;
use App\Texturas;
use App\Helper;
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
        $tejidos = Tejidos::get();
        $tejido = [];
        foreach ($tejidos as $key => $value) {
            $tejido = [
                $value->id => $value->cveCorta
            ];
        }
        $tejido = Helper::arrayHelperSelect($tejido);
        $composiciones = Helper::arrayHelperSelect(ComposicionHilo::pluck('cve_corta_composicion', 'id')->toArray());
        $textura = Helper::arrayHelperSelect(Texturas::pluck('cve_corta_textura', 'id')->toArray());
    	return view('telascliente.create',[
            'tejido' => $tejido,
            'composicion' => $composiciones,
            'textura' => $textura
        ]);
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
        $tejidos = Tejidos::get();
        $tejido = [];
        foreach ($tejidos as $key => $value) {
            $tejido = [
                $value->id => $value->cveCorta
            ];
        }
        $tejido = Helper::arrayHelperSelect($tejido);
        $composiciones = Helper::arrayHelperSelect(ComposicionHilo::pluck('cve_corta_composicion', 'id')->toArray());
        $textura = Helper::arrayHelperSelect(Texturas::pluck('cve_corta_textura', 'id')->toArray());
    	return view('telascliente.update',[
    		'model' => $model,
            'tejido' => $tejido,
            'composicion' => $composiciones,
            'textura' => $textura
    	]);
    }

    public function edit($id, TelasClienteRequest $request){
    	$model = $this->findModel($id);
    	$model->id_tejido = $request->get('id_tejido');
        $model->id_composicion_hilo = $request->get('id_composicion_hilo');
        $model->id_textura = $request->get('id_textura');
        $model->diametro = $request->get('diametro');
        $model->gramaje = $request->get('gramaje');
        $model->descripcion = $request->get('descripcion');
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
