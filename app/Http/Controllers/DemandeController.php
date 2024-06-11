<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use App\Repositories\MailRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\RoleRepository;

class DemandeController extends Controller
{

    protected $role;
    protected $maillable;

    public function __construct(RoleRepository $roleRepository , MailRepository $mailRepository)
    {
        $this->role = $roleRepository;
        $this->maillable = $mailRepository;
    }

    public function mailText($id , $statut){
        if ($statut == 2){
            $this->maillable->sendMail($id , "Votre demande est en cours de traitement");
        }elseif ($statut == 3){
            $this->maillable->sendMail($id , "Votre demande a été rejetée ");
        }else if ($statut == 4){
            $this->maillable->sendMail($id , "Votre demande a été acceptée ");
        }else {
            $this->maillable->sendMail($id , "Rappel , vous avez une demande en  activité sur WORKFLOW-ATD ");
        }
    }

    public  function  index($id){
        $demandes = Demande::where('user_id', $id)->get()->load(['statut','informations']);
        if (Auth::guard('admins')->check()){
            $authorized = $this->role->getRoles();
        }else {
            $authorized = 0;
        }

        return view('admins.message', compact('demandes','authorized'));
    }


    public function editStatut($id , $statut){

        if($this->role->getRoles() !== 3 && $this->role->getRoles() !== 2 &&  $this->role->getRoles() !== 4){
            return redirect()->back()->with('error',"Vous n'etes pas autorisé a executer cette action");
        }

        $user = Demande::find($id);

        $user->statut_id = $statut;

        $user->save();

        $this->mailText($user->user_id,$statut);

        return  redirect()->back()->with('message',"Staut de la demande modifiée avec succès");

    }

    public  function  destroy($id){
        try {
            Demande::destroy($id);
            return  redirect()->back()->with('message',"Statut de la demande modifiée avec succès");
        }catch (\Exception $exception){

            return  redirect()->back()->with('error',"Erreur interne au serveur");
        }
    }

}
