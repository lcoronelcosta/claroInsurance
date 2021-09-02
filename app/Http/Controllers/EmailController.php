<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Email;
use Illuminate\Support\Facades\Artisan;

class EmailController extends Controller
{
    
    //Despacha los correo mediante Command creado
    public function despachar()
    {
        Artisan::call('sendmail:envia-mails');
        $mails = Email::where('user_id', Auth::id())->get();
        return view('/email/listEmails', compact(
            'mails',
        ));
    }
    
    /**
     * Display a listing of the emails.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = array();
        (Auth::user()->role->nombre == 'admin')
        ? $mails = Email::paginate(2)
        : $mails = Email::where('user_id', Auth::id())->paginate(2);
        return view('/email/listEmails', compact(
            'mails',
        ));
    }

    /**
     * Show the form for creating a new email.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/email/createEmail');
    }

    /**
     * Store a newly created email in BD whit state N = no enviado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = new Email();
        $email->user_id = Auth::id();
        $email->asunto = $request->get('asunto');
        $email->destinatario = $request->get('destinatario');
        $email->mensaje = $request->get('mensaje');
        $email->estado = 'N';
        $email->save();

        return redirect('/admin/mails');
    }

    /**
     * Display the specified a email.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mail = Email::where('id', $id)->first();
        return view('/email/viewEmail', compact(
            'mail',
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
