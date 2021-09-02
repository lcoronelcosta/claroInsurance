<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Email;
use Mail;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmail:envia-mails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envio de la cola de Mails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $mails = Email::where('estado', '=', 'N')->get();

        $message = '';
        try{
            foreach ($mails as $mail) {
                $data = array('mensaje' => $mail->mensaje);
                $mail_status = Mail::send( 'email.template', $data, function( $message ) use ($mail, $data) {
                   $message->to( $mail->destinatario )
                   ->from( 'prueba.lcoronel.claroinsure@gmail.com.ec', 'Prueba Tecnica HR ClaroInsure Luis Coronel')
                   ->subject( $mail->asunto );
                });
                $email = Email::where('id', $mail->id)->first();
                $email->estado = 'E';
                $email->save();
            }
               
        }catch(\Swift_TransportException $e){
               dd($e, app('mailer'));
        }
        return 0;
    }
}
