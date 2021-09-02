@extends('layouts.app')
@section('content')
<div class="container">
<a href="/admin/add-user/" class="btn btn-primary btn-lg active mb-3" role="button" aria-pressed="true">Add Usuario</a>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>N</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Celular</th>
                <th>Identificación</th>
                <th>Fecha de Nac</th>
                <th>Ubicación</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count=1;
            ?>
            @forelse($users as $user)
            <tr>
                <td>{{$count}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->edad}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->num_mobile}}</td>
                <td>{{$user->ci}}</td>
                <td>{{$user->dateNac}}</td>
                <td>{{$user->city->nombre}}</td>
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
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection