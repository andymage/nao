<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['texturas/index', 'Lista de Calibre de Hilos'],
		['texturas/update/' . $model->id, 'Textura: ' . $model->textura]
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Actualizar Textura: <b><?= $model->textura ?></b></h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => ['TexturasController@edit', $model->id],
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
		                <label for="calibre">Textura</label>
		                <?=
		                	Form::text('textura',
		                		$model->textura,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Textura'
		                		]
		                	);
		                ?>
		                <?=
		                	Form::text('id',
		                		$model->id,
		                		[
		                			'class' => 'form-control hidden',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Color</label>
		                <?=
		                	Form::text('color',
		                		$model->color,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Color'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Cve Corta Textura</label>
		                <?=
		                	Form::text('cve_corta_textura',
		                		$model->cve_corta_textura,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Cve Corta Textura'
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