<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\RoleRepository;

class DemandeController extends Controller
{

    protected $role;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->role = $roleRepository;
    }

    public  function  index($id){
        $demandes = Demande::where('user_id', $id)->get()->load(['statut','informations']);
        $authorized = $this->role->getRoles();

        return view('admins.message', compact('demandes','authorized'));
    }


    public function editStatut($id , $statut){

        if($this->role->getRoles() !== 3 && $this->role->getRoles() !== 2 &&  $this->role->getRoles() !== 4){
            return redirect()->back()->with('error',"Vous n'etes pas autorisé a executer cette action");
        }

        Demande::find($id)->update(['statut_id' => $statut]);

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
