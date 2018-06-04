<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['composicionhilo/index', 'Lista de Composición de Hilos'],
		['composicionhilo/create/', 'Crear Composición de Hilo']
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Crear Composición de Hilo</h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => 'ComposicionHiloController@store',
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
		                <label for="calibre">Cve Corta Composición</label>
		                <?=
		                	Form::text('cve_corta_composicion',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Cve Corta Composicion'
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