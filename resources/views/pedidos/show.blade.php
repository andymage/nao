<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['pedidos/index', 'Lista de Pedidos'],
        ['pedidos/create/', 'Pedido: ' . $model->id]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Pedido <b><?= $model->id ?></b></h3>
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
                  			<td width="25%"><b>Cliente</b></td>
                  			<td width="75%"><?= $model->cliente->nombre ?></td>
                		</tr>
                        <tr>
                            <td width="25%"><b>Cliente Clave Corta</b></td>
                            <td width="75%"><?= $model->cliente->clave_corta ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Fecha</b></td>
                            <td width="75%"><?= $model->fecha ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Usuario Creador</b></td>
                            <td width="75%"><?= $model->user->name ?></td>
                        </tr>
              		</tbody>
              	</table>
                <div class="box-header box-success with-border">
                    <h3 class="box-title"><b>Telas</b></h3>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Modelo Tela</th>
                            <th>Descripción del Modelo</th>
                            <th>Kgs a Programar</th>
                            <th>Piezas Rec.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($model->productos as $key => $value) {
                                echo '
                                    <tr>
                                        <td>' . $value->tela->modeloTela . '</td>
                                        <td>' . $value->tela->descripcion . '</td>
                                        <td>' . $value->kg_programar . '</td>
                                        <td>' . $value->piezas . '</td>
                                    </tr>';
                                
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
	</div>
@endsection