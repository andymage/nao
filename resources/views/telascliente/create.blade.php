<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['telascliente/index', 'Lista de Telas Cliente'],
		['telascliente/create/', 'Crear tela según necesidades del cliente']
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Crear tela según necesidades del cliente</h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => 'TelasClienteController@store',
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
		                		null,
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
		                		null,
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
		                		null,
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
		                		null,
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
		                		null,
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
		                		null,
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