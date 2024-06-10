<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\Demande;
use App\Models\Role;
use App\Models\User;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\RoleRepository;
class UserController extends Controller
{

    protected $role;
    protected $auth;

    public function __construct(RoleRepository $roleRepository, AuthRepository $authRepository)
    {
        $this->role = $roleRepository;
        $this->auth = $authRepository;
    }

    public  function getUser($id){
        $user = User::find($id);

        return view('admins.update-user',compact('user'));
    }

    public function updateUser(Request $request,$id){

       return $this->auth->updateUser($request,$id);

    }



    public function show(){
        $users = User::all();
        $roles = Role::all();

        return view('admins.client', compact('users','roles'));
    }

    public function deleteUser(Request $request,$id){
        try {
            User::destroy($id);

            return redirect()->back()->with('message','Utilisateur supprimé avec succès');
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Erreur interne du serveur  ');
        }
    }

    public function showDetails($id){
        $user = User::all();
        return view('user.details', compact('user'));
    }

    public function createDemande(Request $request,$id){

        try {
            $demande = $request->validate([
                'objet' => 'required|max:255',
                'description' => 'required|string',
//            'statut_id' => 'required|sometimes:numeric',
            ]);

            Demande::create([
                'objet' => $demande['objet'],
                'description' => $demande['description'],
                'user_id' => $id,
                'statut_id' => 1,
            ]);

            return redirect()->back()->with('message', "Demande créer  avec succès , elle est en attente de validation");
        }catch (\Exception $exception){
            return redirect()->back()->with('error', $exception->getMessage());
        }




    }

    public function updateDemande(Request $request, $id){}

    public function deleteDemande($id){}

    public function showDemandes($id){
        $demandes = Demande::where('user_id', $id)->get()->load(['statut','informations']);
        $authorized = $this->role->getRoles();

        return view('admins.demande', compact('demandes','authorized'));
    }
}
