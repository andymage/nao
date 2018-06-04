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
  <div class="col-md-12">
    <div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Composición Hilo</b></h3>
            </div>
            {!! Form::open(
                    [
                        'action' => ['HilosController@createComposicion', $model->id],
                        'class' => 'form',
                    ]
                ) 
            !!}
                {!! csrf_field() !!}
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="box-body">
                <div class="form-group col-md-4">
                        <label for="calibre">Porcentaje</label>
                        <?=
                            Form::text('porcentaje',
                                null,
                                [
                                    'class' => 'form-control',
                                    'placeholder' => 'Porcentaje'
                                ]
                            );
                        ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="calibre">Material</label>
                        <?=
                            Form::select('id_material',$material,
                                null,
                                [
                                    'class' => 'form-control',
                                ]
                            );
                        ?>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="calibre">Cve Corta Composición</label>
                        <?=
                            Form::text('cve_corta_composicion',
                                null,
                                [
                                    'class' => 'form-control',
                                    'placeholder' => 'Cve Corta Composición'
                                ]
                            );
                        ?>
                    </div>
                    <div class="box-footer form-group col-md-12">
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </div>
                </div>
            {!! Form::close() !!}
            <div class="box-body">
                <table class="table table-bordered">
                  <tbody>
                     <tr>
                        <th width="50%">Material</th>
                        <th width="25%">Porcentaje</th>
                        <th width="25%">Cve Corta Composición</th>
                    </tr>
                    <?php
                        foreach ($model->composicionHilo as $key => $value) {
                            echo 
                                '<tr>',
                                    '<td>' . $value->material->nombre . '</td>',
                                    '<td>' . $value->porcentaje . '</td>',
                                    '<td>' . $value->cve_corta_composicion . '</td>',
                                '</tr>';
                        }
                        echo 
                            '<tr>',
                                '<td><b>Total</b></td>',
                                '<td>' . $model->sumaComposicion . '</td>',
                                '<td></td>',
                            '</tr>';
                    ?>
                  </tbody>
                </table>
            </div>
        </div>
  </div>
@endsection