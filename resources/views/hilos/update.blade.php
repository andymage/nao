<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['materiales/index', 'Lista de Materiales'],
		['materiales/update/' . $model->id, 'Material: ' . $model->nombre]
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Actualizar Material<b><?= $model->nombre ?></b></h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => ['MaterialesController@edit', $model->id],
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
		                <label for="nombre">Nombre Material</label>
		                <?=
		                	Form::text('nombre',
		                		$model->nombre,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Nombre Material'
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
		            <div class="box-footer form-group col-md-12">
		            	<button type="submit" class="btn btn-primary">Actualizar</button>
		            </div>
		        </div>
	        {!! Form::close() !!}
		</div>
	</div>
@endsection