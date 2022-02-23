@extends('adminlte::page')

@section('title', 'Mi blog')

@section('content_header')
    <h1>Listado de roles</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success">
        {{session('info')}}
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a href="{{route('admin.roles.create')}}" class="btn btn-primary">Nuevo rol</a>
        </div>    
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>Role</th>
                    <th colspan="2"></th>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td width="10px">
                                <a href="{{route('admin.roles.edit', $role)}}" class="btn btn-sm btn-primary">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop