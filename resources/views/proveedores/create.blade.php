<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['proveedores/index', 'Lista de Proveedores'],
		['proveedores/create/', 'Crear Proveedor']
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Crear Proveedor</h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => 'ProveedoresController@store',
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
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Nombre Proveedor'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="clave_corta">Clave Corta</label>
		            	<?=
		                	Form::text('clave_corta',
		                		null,
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
		                		null,
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
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Teléfono'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="box-footer form-group col-md-12">
		            	<button type="submit" class="btn btn-primary">Crear</button>
		            </div>
		        </div>
	        {!! Form::close() !!}
		</div>
	</div>
@endsection