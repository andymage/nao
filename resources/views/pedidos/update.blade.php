<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['facturas/index', 'Lista de Facturas'],
        ['facturas/show/' . $model->id, 'Actualizar Factura: ' . $model->consecutivoFactura]
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Actualizar Facturas <?= $model->consecutivoFactura ?></h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => ['FacturasController@edit', $model->id],
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
			                		$model->fecha,
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
		                		$model->id_proveedor,
		                		[
		                			'class' => 'form-control',
		                			'onchange' => 'datosProveedor(this.value)'
		                		]
		                	);
		                ?>
		            </div>
		            
		            <div class="form-group col-md-6">
		                <label for="calibre">Cve Corta</label>
		                <?=
		                	Form::text('cve_corta',
		                		$model->proveedor->clave_corta,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Clave Corta',
		                			'id' => 'clave_corta',
		                			'readonly' => 'readonly'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Número Factura</label>
		                <?=
		                	Form::text('numero_factura',
		                		$model->numero_factura,
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
		                		$model->kg_hilo,
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
		                		$model->lote_hilo,
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
		                		$model->id_hilo,
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
		                		$model->Importe,
		                		[
		                			'class' => 'form-control',
		                			'step' => 'any'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="box-footer form-group col-md-12">
		            	<button type="submit" class="btn btn-primary">Actualzar</button>
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

    	function datosProveedor(id){
			$.ajax({
                url: "<?= url('proveedores/datos') ?>",
                type: "post",
                data: { "_token": "{{ csrf_token() }}",
                    'id': id,
                },
                success: function(data){
                    $('#clave_corta').val(data.clave_corta);
                }
            })
		}
	</script>
@stop