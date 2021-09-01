@extends('layouts.app')
@section('content')
<div class="container">
<a href="/admin/add-user/" class="btn btn-primary btn-lg active mb-3" role="button" aria-pressed="true">Add Usuario</a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Identificación</th>
                <th>Edad</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count=0;
            ?>
            @forelse($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->num_mobile}}</td>
                <td>{{$user->ci}}</td>
                <td><a type="button" href=/admin/edit-user/{{$user->id}}><i class="fas fa-edit"></i></a> 
                 <a type="button" href="/admin/delete-user/{{$user->id}}"> <i class="fas fa-trash-alt"></i> </a> </td>
                 
            </tr>
            <?php 
            $count++;
            ?>
            @empty
                <tr>NO hay nada</tr>
            @endforelse 
        </tbody>
        
        
</table>
<div class="container">
        <div class="row justify-content-md-center">
          {{ $users->appends(request()->query())->links("pagination::bootstrap-4") }}
        </div>
      </div>
</div>

@endsection