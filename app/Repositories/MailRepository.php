<?php

namespace App\Repositories;

use App\Mail\AprouveDemande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailRepository
{
    public function sendMail($id,$text){
        try {
            $user = \App\Models\User::find($id);
            Mail::to($user->email)->send(new AprouveDemande($text));

            //return redirect()->back('success','Un email a été envoyé ');
        }catch (\Exception $exception){
            return redirect()->back("Une erreur s'est produite");
        }
    }
}
