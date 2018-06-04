<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['materiales/index', 'Lista de Materiales'],
		['materiales/show/' . $model->id, 'Material: ' . $model->nombre]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Material <b><?= $model->nombre ?></b></h3>
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
                  			<td width="25%"><b>Registro el usuario</b></td>
                  			<td width="75%"><?= $model->user->name ?></td>
                		</tr>
              		</tbody>
              	</table>
            </div>
        </div>
	</div>
@endsection