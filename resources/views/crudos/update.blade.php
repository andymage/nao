<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['crudos/index', 'Lista de Fichas Técnicas Crudos'],
		['crudos/update/' . $model->id, 'Actualizar Ficha Técnica Crudo' . $model->id]
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Actualizar Ficha Técnica Crudo <?= $model->id ?></h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => ['CrudosController@store', $model->id],
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
	            <div id="div_cp" class="custom-alerts alert alert-danger fade in hidden"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button><p id="error"></p></div>
		        <div class="box-body">
		            <div class="form-group col-md-6">
		                <label for="nombre">Cve Corta Libre</label>
		                <?=
		                	Form::select('id_clave_hilo',$clave,
		                		$model->id_clave_hilo,
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
		                		$model->maquinaCircular->agujas,
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
		                	Form::select('id_maquina_circular',[
		                			NULL => 'Seleccione',
		                			$model->maquinaCircular->id => $model->maquinaCircular->maquina
		                		],
		                		$model->maquinaCircular->id,
		                		[
		                			'class' => 'form-control',
		                			'id' => 'id_maquina_circular',
		                			'onchange' => 'datosMaquina(this.value)'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="direccion">Galga</label>
		            	<?=
		                	Form::text('galga',
		                		$model->galga,
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
		                		$model->gramaje,
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
		                		$model->lm,
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
		                		$model->draw,
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
		                		$model->maquinaCircular->constanteMaquina,
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
		                		$model->kg_rollo,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Kgs de por rollos',
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
                    if (data.error != undefined) {
                        $('#div_cp').removeClass('hidden');
                        $('#error').text(data.error);
                        $('#id_maquina_circular').empty();
            			$("#id_maquina_circular").append('<option value="">Seleccione</option>');
                    }
                    else{
                        $('#div_cp').addClass('hidden');
                        $('#id_maquina_circular').empty();
            			$("#id_maquina_circular").append('<option value="">Seleccione</option>');
                        $.each(data, function( key2, value2 ) {
                            $("#id_maquina_circular").append('<option value='+value2.id+'>'+value2.maquina+'</option>');
                        });
                    }
                }
            })
		}

		function datosMaquina(id){
			$.ajax({
                url: "<?= url('crudos/datos') ?>",
                type: "post",
                data: { "_token": "{{ csrf_token() }}",
                    'id': id,
                    'tipo': 1
                },
                success: function(data){
                    $('#galga').val(data.galga);
                    $('#velocidad').val(data.constanteMaquina);
                }
            })
		}
	</script>
@stop