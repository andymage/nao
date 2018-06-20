<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['facturas/index', 'Lista de Facturas'],
        ['facturas/create/', 'Factura: ' . $model->consecutivoFactura]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Factura <b><?= $model->consecutivoFactura ?></b></h3>
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
                  			<td width="25%"><b>Proveedor</b></td>
                  			<td width="75%"><?= $model->proveedor->nombre ?></td>
                		</tr>
                        <tr>
                            <td width="25%"><b>Proveedor Clave Corta</b></td>
                            <td width="75%"><?= $model->proveedor->clave_corta ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Hilo</b></td>
                            <td width="75%"><?= $model->hilo->cve_corta_hilo ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Número de Factura</b></td>
                            <td width="75%"><?= $model->numero_factura ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Kgs Hilo</b></td>
                            <td width="75%"><?= $model->kg_hilo ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Lote Hilo</b></td>
                            <td width="75%"><?= $model->lote_hilo ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Fecha</b></td>
                            <td width="75%"><?= $model->fecha ?></td>
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