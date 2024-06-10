<?php

namespace App\Http\Controllers;

use App\Mail\AprouveDemande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail(Request $request){
        Mail::to('to@example.com')->send(new AprouveDemande());

        return redirect()->route('overview');
    }
}
