<div>
<div class="card">
    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Buscar usuario"> 
    </div>
    @if($users->count())
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td width="10px"><a class="btn btn-primary btn-sm" href="{{route('admin.users.edit', $user)}}" >Editar</a></td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$users->links()}}
    </div>  
    @else
        <div class="card-body">No hay ningún registro</div>
    @endif  
</div>
</div>
