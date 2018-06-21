<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['pedidos/index', 'Lista de Pedidos'],
		['pedidos/create/', 'Crear Pedido']
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Crear Pedido</h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => 'PedidosController@store',
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
		        	<div class="form-group col-md-4">
		                <label for="calibre">Cliente</label>
		                <?=
		                	Form::select('id_cliente', $clientes,
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'onchange' => 'datosCliente(this.value)'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-4">
		                <label for="calibre">Cliente</label>
		                <?=
		                	Form::text('clave_cliente',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'id' => 'clave_cliente',
		                			'readonly' => 'readonly'
		                		]
		                	);
		                ?>
		            </div>
		        	<div class="form-group col-md-4">
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

		            <div class="form-group col-md-2">
		                <label for="calibre">Modelo Tela</label>
		                <?=
		                	Form::select('id_tela[]', $telas,
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'onchange' => 'datosCliente(this.value)'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-2">
		                <label for="calibre">Descripción del Modelo</label>
		                <?=
		                	Form::text('descripcion_modelo[]',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'readonly' => 'readonly'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-2">
		                <label for="calibre">Kgs a Programar</label>
		                <?=
		                	Form::number('kg_programar[]',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'step' => 'any'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-2">
		                <label for="calibre">Piezas Rec.</label>
		                <?=
		                	Form::number('piezas',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'step' => 'any'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-2">
		                <label for="calibre">Cliente</label>
		                <?=
		                	Form::select('id_cliente', $clientes,
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'onchange' => 'datosCliente(this.value)'
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

    	function datosCliente(id){
			$.ajax({
                url: "<?= url('clientes/datos') ?>",
                type: "post",
                data: { "_token": "{{ csrf_token() }}",
                    'id': id,
                },
                success: function(data){
                    $('#clave_cliente').val(data.clave_corta);
                }
            })
		}
	</script>
@stop