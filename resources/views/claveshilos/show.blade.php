<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['claveshilos/index', 'Lista de Claves de Hilos'],
		['claveshilos/show/' . $model->id, 'Clave de Hilo: ' . $model->cveCortaLibre]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Clave de Hilo <b><?= $model->cveCortaLibre ?></b></h3>
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
                  			<td width="25%"><b>Cve Corta Hilo</b></td>
                  			<td width="75%"><?= $model->hilo->cve_corta_hilo ?></td>
                		</tr>
                        <tr>
                            <td width="25%"><b>Cve Corta Composicion</b></td>
                            <td width="75%"><?= $model->composicionHilo->cve_corta_composicion ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Cve Corta Textura</b></td>
                            <td width="75%"><?= $model->textura->cve_corta_textura ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Cve Corta Libre</b></td>
                            <td width="75%"><?= $model->cveCortaLibre ?></td>
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