<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['proveedores/index', 'Lista de Proveedores'],
		['proveedores/show/' . $model->id, 'Proveedor: ' . $model->nombre]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Proveedor <b><?= $model->nombre ?></b></h3>
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
                  			<td width="25%"><b>Nombre</b></td>
                  			<td width="75%"><?= $model->nombre ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Clave Corta</b></td>
                  			<td width="75%"><?= $model->clave_corta ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Dirección</b></td>
                  			<td width="75%"><?= $model->direccion ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Teléfono</b></td>
                  			<td width="75%"><?= $model->telefono ?></td>
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