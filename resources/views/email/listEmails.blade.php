@extends('layouts.app')
@section('content')

<div class="container">
<a href="/admin/crear-email/" class="btn btn-primary btn-lg active mb-3" role="button" aria-pressed="true">Add Email</a>
<a href="/admin/email-despachar/" class="btn btn-primary btn-lg active mb-3" role="button" aria-pressed="true">Despachar Correos Pendientes</a>
    <div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>N</th>
                <th>Destinatario</th>
                <th>Asunto</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $count=1;
            ?>
            @forelse($mails as $mail)
            <tr>
                <td>{{$count}}</td>
                <td>{{$mail->destinatario}}</td>
                <td>{{$mail->asunto}}</td>
                
                <td>
                    @if($mail->estado == 'N')
                    <div class="mt-2 mb-2">
                        <button class="btn btn-danger btn-sl-sm mr-2"><span class="mr-2"><i class="fa fa-paper-plane"></i></span>No Enviado</button>
                    </div>
                    @else
                    <div class="mt-2 mb-2">
                        <button class="btn btn-success btn-sl-sm mr-2" ><span class="mr-2"><i class="fa fa-paper-plane"></i></span>Enviado</button>
                    </div>
                    @endif
                </td>
                <td><a type="button" href=/admin/ver-email/{{$mail->id}}><i class="fas fa-eye"></i></a> 
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
            {{ $mails->appends(request()->query())->links("pagination::bootstrap-4") }}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
    </div>

@endsection