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
		        	<div class="form-group col-md-12">
		        		<a class="btn btn-app success" onclick="agregar()">
                			<i class="fa fa-plus"></i> Agregar
              			</a>
		        	</div>
		            <div class="form-group col-md-2">
		                <label for="calibre">Modelo Tela</label>
		                <?=
		                	Form::select('Productos[id_tela][]', [],
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'onchange' => 'datosTela(this.value, 0)',
		                			'id' => 'id_tela_0'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-2">
		                <label for="calibre">Descripción del Modelo</label>
		                <?=
		                	Form::text('Productos[descripcion_modelo][]',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'readonly' => 'readonly',
		                			'id' => 'descripcion_modelo_0'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-2">
		                <label for="calibre">Kgs a Programar</label>
		                <?=
		                	Form::number('Productos[kg_programar][]',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'step' => 'any',
		                			'id' => 'kg_programar_0'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-2">
		                <label for="calibre">Piezas Rec.</label>
		                <?=
		                	Form::number('Productos[piezas][]',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'step' => 'any',
		                			'id' => 'piezas_0'
		                		]
		                	);
		                ?>
		            </div>
		            <div id="agregado">
		            	
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
		llenado(0);

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
		i = 0;
		function agregar(){
		    i++;
			$('#agregado').append(
				'<div id="remover_' + i + '"><div class="form-group col-md-12"> </div>' +
		        '<div class="form-group col-md-2"><label for="calibre">Modelo Tela</label>' +
		        	'<select id="id_tela_' + i + '" name="Productos[id_tela][]" class="form-control" onchange="datosTela(this.value, ' + i + ')"></select>' +
		        '</div>' +
		        '<div class="form-group col-md-2"><label for="calibre">Descripción del Modelo</label>' +
		            '<input type="text" name="Productos[descripcion_modelo][]" id="descripcion_modelo_' + i + '" class="form-control" readonly="readonly">' +
		        '</div>' +
		        '<div class="form-group col-md-2"><label for="calibre">Kgs a Programar</label>' +
		            '<?= Form::number("Productos[kg_programar][]", null, ["id" => "", "class" => "form-control", "step" => "any" ] ); ?>' +
		        '</div>' +
		        '<div class="form-group col-md-2"><label for="calibre">Piezas Rec.</label>' +
		            '<?= Form::number("Productos[piezas][]", null, ["id" => "", "class" => "form-control", "step" => "any" ] ); ?>' +
		        '</div>' +
		        '<div class="form-group col-md-2"><br><button type="button" class="btn btn-danger btn-sm" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove" onclick="remove(' + i + ')"><i class="fa fa-times"></i></button></div></div>'
		    );
		    llenado(i);
		}

		function llenado(value){
			$("#id_tela[" + value + "]").append('<option value="">Seleccione</option>');
		    $.ajax({
                url: "<?= url('telascliente/datos') ?>",
                type: "get",
                data: {
                	 "_token": "{{ csrf_token() }}",
                },
                success: function(data){
                    $("#id_tela_" + value).empty();
        			$("#id_tela_" + value).append('<option value="">Seleccione</option>');
                    $.each(data, function( key2, value2 ) {
                        $("#id_tela_" + value).append('<option value='+value2.id+'>'+value2.modeloTela+'</option>');
                    });
                   
                }
            });
		}

		function datosTela(value, id){
			$.ajax({
                url: "<?= url('telascliente/datos') ?>",
                type: "get",
                data: { "_token": "{{ csrf_token() }}",
                    'id': value,
                },
                success: function(data){
                    $('#descripcion_modelo_' + id).val(data.descripcion);
                }
            });
		}

		function remove(id){
			$('#remover_' + id).remove();
		}

	</script>
@stop