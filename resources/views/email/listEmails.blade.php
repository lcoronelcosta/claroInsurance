@extends('layouts.app')
@section('content')

<div class="container">
<a href="/admin/crear-email/" class="btn btn-primary btn-lg active mb-3" role="button" aria-pressed="true">Add Email</a>
    <div class="email-right-box ml-0 ml-sm-4 ml-sm-0">
        <div class="email-list mt-3">
            @forelse($mails as $mail)
            <div class="message">
                <div>
                    <a href="#" >
                        <div class="from col-md-12 border m-1"> <p class="font-weight-bold text-secondary"> Para: {{$mail->destinatario}} </p>
                            <p class="font-italic text-secondary">
                                Asunto: {{$mail->asunto}}
                            </p>
                            @if($mail->estado == 'N')
                            <div class="mt-2 mb-2">
                                <button class="btn btn-danger btn-sl-sm mr-2"><span class="mr-2"><i class="fa fa-paper-plane"></i></span>No Enviado</button>
                            </div>
                            @else
                            <div class="mt-2 mb-2">
                                <button class="btn btn-success btn-sl-sm mr-2" ><span class="mr-2"><i class="fa fa-paper-plane"></i></span>Enviado</button>
                            </div>
                            @endif
                        </div>
                    </a>
                </div>
            </div>
            @empty
                <h3 class="text-primary text-center">No has enviado correos</h3>
            @endforelse

        </div>
    </div>

    @endsection