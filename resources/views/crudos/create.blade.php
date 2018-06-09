<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['crudos/index', 'Lista de Fichas Técnicas Crudos'],
		['crudos/create/', 'Crear Ficha Técnica Crudo']
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Crear Ficha Técnica Crudo</h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => 'CrudosController@store',
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
		                <label for="nombre">Cve Corta Libre</label>
		                <?=
		                	Form::select('id_clave_hilo',$clave,
		                		null,
		                		[
		                			'class' => 'form-control',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="clave_corta">Agujas</label>
		            	<?=
		                	Form::text('agujas',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Agujas',
		                			'id' => 'agujas',
		                			'onchange' => 'maquinas(this.value)'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">Máquina</label>
		            	<?=
		                	Form::select('id_maquina_circular',[NULL => 'Seleccione'],
		                		null,
		                		[
		                			'class' => 'form-control',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">Galga</label>
		            	<?=
		                	Form::text('galga',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Galga',
		                			'readonly' => 'readonly',
		                			'id' => 'galga'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">Gramaje en Crudo</label>
		            	<?=
		                	Form::text('gramaje',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Gramaje en Crudo',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">Diámetro Acabado/Crudo</label>
		            	<?=
		                	Form::text('diametrogramaje',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Diámetro Acabado/Crudo',
		                			'readonly' => 'readonly',
		                			'id' => 'diametrogramaje'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">L.M.</label>
		            	<?=
		                	Form::text('lm',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'L.M.',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">DRAW</label>
		            	<?=
		                	Form::text('draw',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'DRAW',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">Velocidad por kgs de tejido</label>
		            	<?=
		                	Form::text('velocidad',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Velocidad por kgs de tejido',
		                			'readonly' => 'readonly',
		                			'id' => 'velocidad'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">Kgs de por rollos</label>
		            	<?=
		                	Form::text('kg_rollo',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Kgs de por rollos',
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
		function maquinas(valor){
			$.ajax({
                url: "<?= url('crudos/datos') ?>",
                type: "post",
                data: { "_token": "{{ csrf_token() }}",
                    'id': valor,
                },
                success: function(data){
                    $('#nombre_obligado').text(data.nombre)
                    $('#id_obligado_modal').val(data.id);
                }
            })
		}
	</script>
@stop