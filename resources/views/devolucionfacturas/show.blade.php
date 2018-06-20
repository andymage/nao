<?php
  use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
  Helper::breadCrumbs([
        ['devolucionfacturas/index', 'Lista de Devolución Facturas'],
        ['devolucionfacturas/create/', 'Devolución Factura: ' . $model->consecutivoFactura]
  ]) 
?>

@include('flash::message')
  <div class="col-md-12">
    <div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Devolución Factura <b><?= $model->consecutivoFactura ?></b></h3>
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
                        <td width="75%"><?= $model->factura->proveedor->nombre ?></td>
                    </tr>
                        <tr>
                            <td width="25%"><b>Proveedor Clave Corta</b></td>
                            <td width="75%"><?= $model->factura->proveedor->clave_corta ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Hilo</b></td>
                            <td width="75%"><?= $model->factura->hilo->cve_corta_hilo ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Número de Factura</b></td>
                            <td width="75%"><?= $model->factura->numero_factura ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Kgs Devueltos</b></td>
                            <td width="75%"><?= $model->kg_dev ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Lote Hilo</b></td>
                            <td width="75%"><?= $model->factura->lote_hilo ?></td>
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