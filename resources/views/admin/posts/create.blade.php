@extends('adminlte::page')

@section('title', 'Mi blog')

@section('content_header')
    <h1>Crear post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Título') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del post']) !!}
                </div>
                @error('name')
                    <small class="text-danger">{{$message}}</small>
                @enderror

                <div class="form-group">
                    {!! Form::label('category_id', 'Categoría') !!}
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
                </div>
                @error('category_id')
                    <small class="text-danger">{{$message}}</small>
                @enderror

                <div class="form-group">
                    <p class="font-weight-bold">Etiquetas</p>
                    @foreach ($tags as $tag)
                        <label class="mr-2">
                            {!! Form::checkbox('tags[]', $tag->id, null) !!}
                            {{$tag->name}}
                        </label>
                    @endforeach
                </div>
                @error('tags')
                    <small class="text-danger">{{$message}}</small>
                @enderror

                <div class="form-group">
                    <p class="font-weight-bold">Estado</p>

                    <label>
                        {!! Form::radio('status', 0, true) !!}
                        Borrador
                    </label>
                    
                    <label>
                        {!! Form::radio('status', 1, false) !!}
                        Publicado
                    </label>
                </div>
                @error('status')
                    <small class="text-danger">{{$message}}</small>
                @enderror

                <div class="form-group">
                    {!! Form::label('extract', 'Extract') !!}
                    {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
                </div>
                @error('extract')
                    <small class="text-danger">{{$message}}</small>
                @enderror

                <div class="form-group">
                    {!! Form::label('body', 'Cuerpo del post') !!}
                    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
                </div>
                @error('body')
                    <small class="text-danger">{{$message}}</small>
                @enderror

                {!! Form::submit('Crear', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
    
@endsection