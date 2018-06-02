<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grids\ProveedoresGrid;
use App\Proveedores;
use App\Http\Requests\ProveedoresRequest;

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

    public function store(ProveedoresRequest $request){
        $data = $request->all();
        $data['id_user'] = $request->user()->id;
        $model = Proveedores::create($data);
        flash('¡Creado Correctamente!')->success();
        return redirect('proveedores/index');
    }
}
