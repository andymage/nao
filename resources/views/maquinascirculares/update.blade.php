<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['maquinascirculares/index', 'Lista de Máquinas Circulares'],
		['maquinascirculares/update/' . $model->id, 'Máquina Circular: ' . $model->constanteMaquina]
	]) 
?>
	<div class="col-md-12">
		<div class="box box-success">
		    <div class="box-header with-border">
		        <h3 class="box-title">Actualizar Máquina Circular<b><?= $model->constanteMaquina ?></b></h3>
		    </div>
		    {!! Form::open(
		            [
		                'action' => ['MaquinasCircularesController@edit', $model->id],
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
		                <label for="agujas">Agujas</label>
		                <?=
		                	Form::text('agujas',
		                		$model->agujas,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Agujas'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="alimentadores">Alimentadores</label>
		                <?=
		                	Form::text('alimentadores',
		                		$model->alimentadores,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Alimentadores'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="rpm">RPM</label>
		                <?=
		                	Form::text('rpm',
		                		$model->rpm,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'RPM'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="galga">Galga</label>
		                <?=
		                	Form::text('galga',
		                		$model->galga,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Galga'
		                		]
		                	);
		                ?>
		            </div>
		            <div class="form-group col-md-6">
		                <label for="maquina">Máquina</label>
		                <?=
		                	Form::text('maquina',
		                		$model->maquina,
		                		[
		                			'class' => 'form-control',
		                			'placeholder' => 'Máquina'
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