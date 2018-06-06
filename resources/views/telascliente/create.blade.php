<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['tejidos/index', 'Lista de Tejidos'],
		['tejidos/create/', 'Crear Tejido']
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Crear Tejido</h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => 'TejidosController@store',
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
		                <label for="tejido">Tejido</label>
		                <?=
		                	Form::text('tejido',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Tejido'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="modelo">Modelo</label>
		            	<?=
		                	Form::text('modelo',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Modelo'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="cve_tejido">Cve Tejido</label>
		            	<?=
		                	Form::text('cve_tejido',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Cve Tejido'
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