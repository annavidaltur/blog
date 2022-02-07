@extends('adminlte::page')

@section('title', 'Mi blog')

@section('content_header')
    <h1>Editar categoría</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
    @endif
    
    <div class="card">
        <div class="card-body">
            {!! Form::model($category, ['route' => ['admin.categories.update', $category ], 'method' => 'PUT']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}
                </div>
                @error('name')
                    <span class="text-danger">{{$message}}</span><br>
                @enderror
                {{-- El plugin no me funciona, crearemos el slug en el controlador
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la categoría']) !!}
                </div> --}}

                {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop