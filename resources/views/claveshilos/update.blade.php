<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['claveshilos/index', 'Lista de Claves de Hilos'],
		['claveshilos/update/' . $model->id, 'Clave de Hilo: ' . $model->cveCortaLibre]
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Actualizar Clave de Hilo<b><?= $model->cveCortaLibre ?></b></h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => ['ClavesHilosController@edit', $model->id],
		                'class' => 'form',
		            ]
	          	) 
	        !!}
	        	{!! csrf_field() !!}
	        	@if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
	            @endif
		        <div class="box-body">
		            <div class="form-group col-md-6">
		                <label for="calibre">Cve Calibre</label>
		                <?=
		                	Form::text('id',
		                		$model->id,
		                		[
		                			'class' => 'form-control hidden',
		                		]
		                	);
		                ?>
		                <?=
		                	Form::select('id_hilo',$hilos,
		                		$model->id_hilo,
		                		[
		                			'class' => 'form-control',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Cve Comp</label>
		                <?=
		                	Form::select('id_composicion_hilo',$composicionhilo,
		                		$model->id_composicion_hilo,
		                		[
		                			'class' => 'form-control',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Cve Textura/Color</label>
		                <?=
		                	Form::select('id_textura',$texturas,
		                		$model->id_textura,
		                		[
		                			'class' => 'form-control',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="box-footer form-group col-md-12">
		            	<button type="submit" class="btn btn-primary">Actualizar</button>
		            </div>
		        </div>
	        {!! Form::close() !!}
		</div>
	</div>
@endsection