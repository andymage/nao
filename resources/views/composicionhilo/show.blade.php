<?php
	use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
	Helper::breadCrumbs([
		['composicionhilo/index', 'Lista de Composición de Hilos'],
		['composicionhilo/show/' . $model->id, 'Composición de Hilo: ' . $model->cve_corta_composicion]
	]) 
?>

@include('flash::message')
	<div class="col-md-12">
		<div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Composición de Hilo <b><?= $model->cve_corta_composicion ?></b></h3>
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
                  			<td width="25%"><b>Cve Corta Composición</b></td>
                  			<td width="75%"><?= $model->cve_corta_composicion ?></td>
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
                            'action' => ['ComposicionHiloController@createPorcentaje', $model->id],
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
                    <div class="form-group col-md-6">
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
                        <div class="form-group col-md-6">
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
                            <th width="25%">Acciones</th>
                        </tr>
                        <?php
                            foreach ($model->porcetanjeComposicion as $key => $value) {
                                echo 
                                    '<tr>',
                                        '<td>' . $value->material->nombre . '</td>',
                                        '<td>' . $value->porcentaje . '</td>',
                                        '<td>' .
                                        '<a href="' . url('composicionhilo/destroyporcentaje/' . $value->id) . '" class="btn btn-danger"><i class="fa fa-trash font-white"></i></a>' . '</td>',

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