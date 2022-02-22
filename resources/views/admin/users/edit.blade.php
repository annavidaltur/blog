@extends('adminlte::page')

@section('title', 'Mi blog')

@section('content_header')
    <h1>Asignar un rol</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{$user->name}}</p>
            
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}                
                <p class="h5">Roles</p>
                @foreach ($roles as $role)                    
                    <label class="mr-2">
                        {!! Form::checkbox('roles[]', $role->id, null,  ['class' => 'mr-1']) !!}
                        {{$role->name}}
                    </label>
                    <br>  
                @endforeach

                {!! Form::submit('Asignar rol', ['class' => 'btn btn-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop 