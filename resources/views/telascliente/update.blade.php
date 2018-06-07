<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['telascliente/index', 'Lista de Telas Cliente'],
		['telascliente/create/', 'Actualizar Modelo Tela: ' . $model->modeloTela]
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Actualizar Modelo Tela: <?= $model->modeloTela ?></h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => ['TelasClienteController@store', $model->id],
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
		                <label for="tejido">Tipo de Tejido</label>
		                <?=
		                	Form::select('id_tejido', $tejido,
		                		$model->id_tejido,
		                		[
		                			'class' => 'form-control',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="modelo">Composición</label>
		            	<?=
		                	Form::select('id_composicion_hilo', $composicion,
		                		$model->id_composicion_hilo,
		                		[
		                			'class' => 'form-control',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="cve_tejido">Tipo de Textura</label>
		            	<?=
		                	Form::select('id_textura', $textura,
		                		$model->id_textura,
		                		[
		                			'class' => 'form-control',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="cve_tejido">Diámetro</label>
		            	<?=
		                	Form::text('diametro',
		                		$model->diametro,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'SM'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="cve_tejido">Gramajes en Tela</label>
		            	<?=
		                	Form::text('gramaje',
		                		$model->gramaje,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'g/m²'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="cve_tejido">Descripción</label>
		            	<?=
		                	Form::text('descripcion',
		                		$model->descripcion,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Descripción'
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