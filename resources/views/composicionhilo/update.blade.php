<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['composicionhilo/index', 'Lista de Composición de Hilos'],
		['composicionhilo/update/' . $model->id, 'Composición de Hilo: ' . $model->cve_corta_composicion]
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Composición de Hilo<b><?= $model->cve_corta_composicion ?></b></h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => ['ComposicionHiloController@edit', $model->id],
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
		                <label for="calibre">Cve Corta Composición</label>
		                <?=
		                	Form::text('cve_corta_composicion',
		                		$model->cve_corta_composicion,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Cve Corta Composición'
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