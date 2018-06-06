<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['tejidos/index', 'Lista de Tejidos'],
		['tejidos/show/' . $model->id, 'Tejido: ' . $model->tejido]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Tejido <b><?= $model->tejido ?></b></h3>
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
                  			<td width="25%"><b>Tejido</b></td>
                  			<td width="75%"><?= $model->tejido ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Modelo</b></td>
                  			<td width="75%"><?= $model->modelo ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Cve Tejido</b></td>
                  			<td width="75%"><?= $model->cve_tejido ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Número Consecutivo</b></td>
                  			<td width="75%"><?= $model->numero_consecutivo ?></td>
                		</tr>
                        <tr>
                            <td width="25%"><b>Cve Corta</b></td>
                            <td width="75%"><?= $model->cveCorta ?></td>
                        </tr>
                		<tr>
                  			<td width="25%"><b>Registro el usuario</b></td>
                  			<td width="75%"><?= $model->user->name ?></td>
                		</tr>
              		</tbody>
              	</table>
            </div>
        </div>
	</div>
@endsection