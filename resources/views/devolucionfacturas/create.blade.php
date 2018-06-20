<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['devolucionfacturas/index', 'Lista de Devolución de Facturas'],
		['devolucionfacturas/create/', 'Devolución Factura']
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Devolución Facturas</h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => 'DevolucionFacturasController@store',
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
		                <label for="calibre">Factura</label>
		                <?=
		                	Form::select('id_factura', $facturas,
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'onchange' => 'datosFactura(this.value)',
		                			'id' => 'id_factura'
		                		]
		                	);
		                ?>
		            </div>
		            
		            <div class="form-group col-md-6">
		                <label for="calibre">Proveedores</label>
		                <?=
		                	Form::text('proveedor',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Proveedor',
		                			'readonly' => 'readonly',
		                			'id' => 'proveedor',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Clave Corta</label>
		                <?=
		                	Form::text('clave_corta',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Clave Corta',
		                			'readonly' => 'readonly',
		                			'id' => 'clave_corta',
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
		                			'readonly' => 'readonly',
		                			'id' => 'lote_hilo',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Clave Hilo</label>
		                <?=
		                	Form::text('id_hilo',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'id' => 'id_hilo',
		                			'readonly' => 'readonly',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Kgs Devueltos</label>
		                <?=
		                	Form::text('kg_dev',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Kgs Devueltos',
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

    	function datosFactura(id){
			$.ajax({
                url: "<?= url('facturas/datos') ?>",
                type: "post",
                data: { "_token": "{{ csrf_token() }}",
                    'id': id,
                },
                success: function(data){
                    $('#proveedor').val(data.proveedor.nombre);
                    $('#clave_corta').val(data.proveedor.clave_corta);
                    $('#lote_hilo').val(data.lote_hilo);
                    $('#id_hilo').val(data.hilo.cve_corta_hilo);
                }
            })
		}
	</script>
@stop