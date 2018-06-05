@extends('layouts.app')

@section('content')

@include('flash::message')

    <div class="panel panel-default">
        {!! $grid !!}
    </div>
@endsection