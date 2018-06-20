<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['facturas/index', 'Lista de Facturas'],
		['facturas/create/', 'Crear Factura']
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Crear Facturas</h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => 'FacturasController@store',
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
		                <label for="calibre">Fecha</label>
                		<div class="input-group date">
                    		<div class="input-group-addon">
                    			<i class="fa fa-calendar"></i>
                  			</div>
			                <?=
			                	Form::text('fecha',
			                		null,
			                		[
			                			'class' => 'form-control pull-right',
			                			'id' => 'fecha'
			                		]
			                	);
			                ?>
		            	</div>
		            </div>
		        	<div class="form-group col-md-6">
		                <label for="calibre">Proveedor</label>
		                <?=
		                	Form::select('id_proveedor', $proveedores,
		                		null,
		                		[
		                			'class' => 'form-control',
		                		]
		                	);
		                ?>
		            </div>
		            
		            <div class="form-group col-md-6">
		                <label for="calibre">Cve Corta</label>
		                <?=
		                	Form::text('cve_corta',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Clave Corta',
		                			'readonly' => 'readonly'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Número Factura</label>
		                <?=
		                	Form::text('numero_factura',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Número Factura',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Kgs Hilo</label>
		                <?=
		                	Form::text('kg_hilo',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Kgs Hilo',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Lote de Hilo</label>
		                <?=
		                	Form::text('lote_hilo',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Lote de Hilo',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Clave Hilo</label>
		                <?=
		                	Form::select('id_hilo', $hilos,
		                		null,
		                		[
		                			'class' => 'form-control',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Importe</label>
		                <?=
		                	Form::number('importe',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'step' => 'any'
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
@stop

@section('javascript')
	<script type="text/javascript">
		$('#fecha').datepicker({
      		autoclose: true,
      		format: 'yyyy-mm-dd'
    	});
	</script>
@stop