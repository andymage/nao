<?php
    use App\Helper;
?>
@extends('layouts.app')

@section('content')
<?= 
    Helper::breadCrumbs([
        ['texturas/index', 'Lista Texturas de Hilos'],
        ['texturas/show/' . $model->id, 'Textura: ' . $model->textura]
    ]) 
?>

@include('flash::message')
    <div class="col-md-12">
        <div class="box">
            <div class="box-header box-success with-border">
              <h3 class="box-title">Textura: <b><?= $model->textura ?></b></h3>
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
                            <td width="25%"><b>Textura</b></td>
                            <td width="75%"><?= $model->textura ?></td>
                        </tr>
                    <tr>
                        <td width="25%"><b>Cve Corta Textura</b></td>
                        <td width="75%"><?= $model->cve_corta_textura ?></td>
                    </tr>
                    <tr>
                        <td width="25%"><b>Color</b></td>
                        <td width="75%"><?= $model->color ?></td>
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