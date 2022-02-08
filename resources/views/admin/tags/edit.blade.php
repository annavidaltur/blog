@extends('adminlte::page')

@section('title', 'Mi blog')

@section('content_header')
    <h1>Editar etiqueta</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
    @endif
    
    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'PUT']) !!}

                @include('admin.tags.partials.form')

                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop