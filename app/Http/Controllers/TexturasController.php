<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\TexturasGrid;
use App\Texturas;
use App\Http\Requests\TexturaRequest;
use App\Helper;

class TexturasController extends Controller
{
    public function index(Request $request){
    	$model = Texturas::getQuery();
    	$grid = (new TexturasGrid())
            ->create([
                'query' => $model,
                'request' => $request
            ])
            ->renderOn('texturas.index');
        return $grid;
    }

    public function create(){
    	return view('texturas.create');
    }

    public function store(TexturaRequest $request){
    	$data = $request->all();
    	$data['id_user'] = $request->user()->id;
    	$model = Texturas::create($data);
    	flash('¡Creado Correctamente!')->success();
        return redirect('texturas/show/' . $model->id);
    }

    public function show($id){
    	$model = $this->findModel($id);
    	return view('texturas.show', [
    		'model' => $model,
    	]);
    }

    public function update($id){
    	$model = $this->findModel($id);
    	return view('texturas.update',[
    		'model' => $model
    	]);
    }

    public function edit($id, TexturaRequest $request){
    	$model = $this->findModel($id);
        $model->textura = $request->get('textura');
        $model->color = $request->get('color');
        $model->cve_corta_textura = $request->get('cve_corta_textura');
    	if ($model->save()) {
    		flash('¡Actualizado Correctamente!')->success();
        	return redirect('texturas/show/' . $model->id);
    	}
    	flash('¡Ocurrió un error, inténtalo nuevamente!')->success();
        return redirect('texturas/show/' . $model->id);
    }

    protected function findModel($id)
    {
        if (($model = Texturas::find($id)) !== null) {
            return $model;
        } else {
            abort(404);
        }
    }
}
