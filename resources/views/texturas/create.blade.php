<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['texturas/index', 'Lista de Texturas'],
		['texturas/create/', 'Crear Textura']
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Crear Textura</h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => 'TexturasController@store',
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
		                <label for="calibre">Textura</label>
		                <?=
		                	Form::text('textura',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Textura'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Color</label>
		                <?=
		                	Form::text('color',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Color'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Cve Corta Textura</label>
		                <?=
		                	Form::text('cve_corta_textura',
		                		null,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Cve Corta Textura'
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