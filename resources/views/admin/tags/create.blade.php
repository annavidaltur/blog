@extends('adminlte::page')

@section('title', 'Mi blog')

@section('content_header')
    <h1>Crear etiqueta</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.tags.store']) !!}

                @include('admin.tags.partials.form')
                
                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop