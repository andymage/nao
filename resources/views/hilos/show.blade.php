<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['hilos/index', 'Lista de Calibre de Hilos'],
		['hilos/show/' . $model->id, 'Calibre de Hilo: ' . $model->cve_corta_hilo]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Calibre de Hilo <b><?= $model->cve_corta_hilo ?></b></h3>
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
                  			<td width="25%"><b>Calibre</b></td>
                  			<td width="75%"><?= $model->calibre ?></td>
                		</tr>
                    <tr>
                        <td width="25%"><b>Cve Corta Hilo</b></td>
                        <td width="75%"><?= $model->cve_corta_hilo ?></td>
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