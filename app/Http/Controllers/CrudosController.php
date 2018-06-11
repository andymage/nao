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
        $array = Helper::getQuery($request->all(), [
            'id' => 'crudos.id',
            'maquina' => 'maquinas_circulares.maquina',
            'agujas' => 'maquinas_circulares.agujas',
            'gramaje' => 'crudos.gramaje',
            'lm' => 'crudos.lm',
            'draw' => 'crudos.draw',
            'kg_rollo' => 'crudos.kg_rollo',
        ]);
    	$model = Crudos::select([
                'crudos.id as id',
                'maquinas_circulares.maquina as maquina',
                'maquinas_circulares.agujas as agujas',
                'crudos.gramaje as gramaje',
                'crudos.lm as lm',
                'crudos.draw as draw',
                'crudos.kg_rollo as kg_rollo',
            ])
            ->join('maquinas_circulares', 'maquinas_circulares.id', '=', 'crudos.id_maquina_circular')
            ->getQuery();
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
        $claveshilos = ClavesHilos::get();
        $clave = [];
        foreach ($claveshilos as $key => $value) {
            $clave[$value->id] = $value->cveCortaLibre;
        }
        $clave = Helper::arrayHelperSelect($clave);
    	return view('crudos.update',[
    		'model' => $model,
            'clave' => $clave
    	]);
    }

    public function edit($id, CrudosRequest $request){
    	$model = $this->findModel($id);
    	$model->id_clave_hilo = $request->get('id_clave_hilo');
        $model->id_maquina_circular = $request->get('id_maquina_circular');
        $model->gramaje = $request->get('gramaje');
        $model->lm = $request->get('lm');
        $model->draw = $request->get('draw');
        $model->kg_rollo = $request->get('kg_rollo');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('crudos/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('crudos/show/' . $model->id);
    }

    public function datos(Request $request){
        $id = $request->get('id');
        $txt = '';
        if ($request->get('tipo')) {
            $model = MaquinasCirculares::find($id);
        }
        else{
            $model = MaquinasCirculares::where([
                ['agujas', '=',$id]
            ])
            ->get();
            if (empty($model[0])) {
                return [
                    'error' => 'No existe máquina para ese número de Agujas'
                ];
            }
        }
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
