<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
    ['telascliente/index', 'Lista de Telas Cliente'],
    ['telascliente/create/', 'Modelo Tela: ' . $model->modeloTela]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Modelo Tela: <b><?= $model->modeloTela ?></b></h3>
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
                        <td width="25%"><b>Tipo de de Tejido</b></td>
                        <td width="75%"><?= $model->tejido->cveCorta ?></td>
                    </tr>
                		<tr>
                  			<td width="25%"><b>Composición</b></td>
                  			<td width="75%"><?= $model->composicionHilo->cve_corta_composicion ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Tipo de Textura</b></td>
                  			<td width="75%"><?= $model->textura->cve_corta_textura ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Diámetro</b></td>
                  			<td width="75%"><?= $model->diametro ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Gramajes en Tela</b></td>
                  			<td width="75%"><?= $model->gramaje ?></td>
                		</tr>
                        <tr>
                            <td width="25%"><b>Descripción</b></td>
                            <td width="75%"><?= $model->descripcion ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Modelo Tela</b></td>
                            <td width="75%"><?= $model->modeloTela ?></td>
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