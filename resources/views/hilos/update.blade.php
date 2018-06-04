<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['hilos/index', 'Lista de Calibre de Hilos'],
		['hilos/update/' . $model->id, 'Calibre de Hilo: ' . $model->cve_corta_hilo]
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Actualizar Calibre de Hilo<b><?= $model->cve_corta_hilo ?></b></h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => ['HilosController@edit', $model->id],
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
		                <label for="calibre">Calibre</label>
		                <?=
		                	Form::text('calibre',
		                		$model->calibre,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Calibre'
		                		]
		                	);
		                ?>
		                <?=
		                	Form::text('id',
		                		$model->id,
		                		[
		                			'class' => 'form-control hidden',
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="calibre">Cve Corta Hilo</label>
		                <?=
		                	Form::text('cve_corta_hilo',
		                		$model->cve_corta_hilo,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Cve Corta Hilo'
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
@endsection