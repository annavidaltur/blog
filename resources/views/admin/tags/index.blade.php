@extends('adminlte::page')

@section('title', 'Mi blog')

@section('content_header')
    <h1>Listado de etiquetas</h1>
@stop

@section('content')
    @if(session('info'))
        <div class="alert alert-success"><strong>{{session('info')}}</strong></div>
    @endif
    <div class="card">
        @can('admin.tags.create')
            <div class="card-header">
                <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Nueva etiqueta</a>
            </div>    
        @endcan        
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Color</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->id}}</td>
                            <td>{{$tag->name}}</td>
                            <td>{{$tag->color}}</td>
                            <td width="10px">
                                @can('admin.tads.edit')
                                    <a class="btn btn-primary btn-sm" href="{{route('admin.tags.edit', $tag)}}" >Editar</a></td>    
                                @endcan                                
                            <td width="10px">
                                @can('admin.tags.destroy')
                                    <form action="{{route('admin.tags.destroy', $tag)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>                                    
                                    </form>    
                                @endcan                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
