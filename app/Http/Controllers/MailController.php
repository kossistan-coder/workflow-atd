<?php

namespace App\Http\Controllers;

use App\Mail\AprouveDemande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
//    public function sendMail(Request $request , $id){
//        try {
//            $user = \App\Models\User::find($id);
//            Mail::to($user->email)->send(new AprouveDemande());
//
//            return redirect()->back('success','Un email a été envoyé ');
//        }catch (\Exception $exception){
//            return redirect()->back('error',"Une erreur s'est produite");
//        }
//    }
}
