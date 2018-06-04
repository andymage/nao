<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['proveedores/index', 'Lista de Proveedores'],
		['proveedores/update/' . $model->id, 'Proveedor: ' . $model->nombre]
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Actualizar Proveedor<b><?= $model->nombre ?></b></h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => ['ProveedoresController@edit', $model->id],
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
		                <label for="nombre">Nombre Proveedor</label>
		                <?=
		                	Form::text('nombre',
		                		$model->nombre,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Nombre Proveedor'
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
		                <label for="clave_corta">Clave Corta</label>
		            	<?=
		                	Form::text('clave_corta',
		                		$model->clave_corta,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Clave Corta'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">Dirección</label>
		            	<?=
		                	Form::text('direccion',
		                		$model->direccion,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Direccion'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">Teléfono</label>
		            	<?=
		                	Form::number('telefono',
		                		$model->telefono,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Teléfono'
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