@extends('adminlte::page')

@section('title', 'Mi blog')

@section('content_header')
    <h1>Crear post</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

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
                
                <div class="row mb-3">
                    <div class="col">
                        <div class="image-wrapper">
                            <img id="picture" src="https://cdn.pixabay.com/photo/2022/01/16/13/49/dog-6942065_960_720.jpg" alt="">
                        </div>                        
                    </div>
                    <div class="col">
                        <div class="form-group">
                            {!! Form::label('file', 'Imagen del post') !!}
                            {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}
                            <p>Sólo jpgs.</p>
                        </div>
                        @error('file')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                
                </div>
                
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

@section('css')
<style>
    .image-wrapper{
        position: relative;
        padding-bottom: 56.25%;
    }

    .image-wrapper img{
        position: absolute;
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
</style>
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

        document.getElementById('file').addEventListener('change', cambiarImagen);

        function cambiarImagen(){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file); 
        }
    </script>
    
@endsection