<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['crudos/index', 'Lista de Fichas Técnicas Crudos'],
        ['crudos/show/' . $model->id, 'Ficha Técnica Crudo: ' . $model->id]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Ficha Técnica Crudo: <b><?= $model->id ?></b></h3>
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
                  			<td width="25%"><b>Cve Corta Libre</b></td>
                  			<td width="75%"><?= $model->claveHilo->cveCortaLibre ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Máquina</b></td>
                  			<td width="75%"><?= $model->maquinaCircular->maquina ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Agujas</b></td>
                  			<td width="75%"><?= $model->maquinaCircular->agujas ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Galga</b></td>
                  			<td width="75%"><?= $model->maquinaCircular->galga ?></td>
                		</tr>
                		<tr>
                  			<td width="25%"><b>Gramaje en Crudo</b></td>
                  			<td width="75%"><?= $model->gramaje ?></td>
                		</tr>
                        <tr>
                            <td width="25%"><b>Diametro Acabado/Crudo</b></td>
                            <td width="75%"><?= '' ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>L.M.</b></td>
                            <td width="75%"><?= $model->lm ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>DRAW</b></td>
                            <td width="75%"><?= $model->draw ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Velocidad por kgs de tejido</b></td>
                            <td width="75%"><?= $model->maquinaCircular->constanteMaquina ?></td>
                        </tr>
                        <tr>
                            <td width="25%"><b>Kgs por Rollo</b></td>
                            <td width="75%"><?= $model->kg_rollo ?></td>
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