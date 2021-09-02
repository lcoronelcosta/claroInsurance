@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            To: {{$mail->destinatario}}

        </div>
        <p class="text-muted ml-4 mt-2 mb-0"> Asunto:
            {{$mail->asunto}}
        </p>

        <div class="card-body">
            <blockquote class="blockquote mb-0">
                <p>{{$mail->mensaje}}</p>
                <footer class="text-success">
                    @if($mail->estado == 'N')
                    <div class="mt-2 mb-2">
                        <button class="btn btn-danger btn-sl-sm mr-2"><span class="mr-2"><i class="fa fa-paper-plane"></i></span>No Enviado</button>
                    </div>
                    @else
                    <div class="mt-2 mb-2">
                        <button class="btn btn-success btn-sl-sm mr-2" ><span class="mr-2"><i class="fa fa-paper-plane"></i></span>Enviado</button>
                    </div>
                    @endif
                </footer>
            </blockquote>
        </div>
    </div>
</div>

@endsection