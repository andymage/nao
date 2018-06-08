<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
    ['maquinascirculares/index', 'Lista de Máquinas Circulares'],
		['maquinascirculares/show/' . $model->id, 'Máquina Circular: ' . $model->maquina]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Máquina Circular <b><?= $model->maquina ?></b></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              	<table class="table table-bordered">
                	<tbody>
                		<tr>
                  			<td width="25%"><b>Id</b></td>
                        <td width="75%"><?= $model->id ?></td>
                    </tr>
                    <tr>
                        <td width="25%"><b>Máquina</b></td>
                        <td width="75%"><?= $model->maquina ?></td>
                    </tr>
                    <tr>
                        <td width="25%"><b>Constante Máquina</b></td>
                        <td width="75%"><?= $model->constanteMaquina ?></td>
                    </tr>
                    <tr>
                        <td width="25%"><b>Agujas</b></td>
                        <td width="75%"><?= $model->agujas ?></td>
                    </tr>
                    <tr>
                        <td width="25%"><b>Alimentadores</b></td>
                        <td width="75%"><?= $model->alimentadores ?></td>
                    </tr>
                    <tr>
                        <td width="25%"><b>RPM</b></td>
                        <td width="75%"><?= $model->rpm ?></td>
                    </tr>
                    <tr>
                        <td width="25%"><b>Galga</b></td>
                        <td width="75%"><?= $model->galga ?></td>
                    </tr>
              		</tbody>
              	</table>
            </div>
        </div>
	</div>
@endsection