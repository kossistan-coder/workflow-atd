<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthRepository
{

    public  function  editRole(Request $request,$id)
    {
        if (AdminRole::where('admin_id',$id)->count() > 0){
            AdminRole::where('admin_id',$id)->update(['role_id'=>$request['roles']]);

        }else {

            AdminRole::create(['admin_id'=>$id,'role_id'=>$request['roles']]);

        }

    }


    public function updateUser(Request $request,$id){
        try {
            $credentials = $request->validate([
                'email' => 'sometimes|email|unique:users,email,'.$id,
                'nom' => 'sometimes|string|max:255',
                'prenom' => 'sometimes|string',
                'telephone' => 'sometimes|numeric|unique:users,telephone,'.$id,
            ]);

            $user = User::find($id);

            $user->nom = $credentials['nom'] ?? $user->nom;
            $user->prenom = $credentials['prenom'] ?? $user->prenom;
            $user->telephone = $credentials['telephone'] ?? $user->telephone;
            $user->email = $credentials['email'] ?? $user->email;
            $user->save();

            if (Auth::guard('web')->user() !== null){
                Auth::guard('web')->login($user);
            }

            return redirect()->back()->with('message',"Utilisateur modifié avec succès");
        }catch (\Exception $exception){
            return redirect()->back()->with('error','Erreur interne du serveur');
        }
    }

    public function updateAdmin(Request $request,$id){
        try {
            $admin = Admin::find($id);

            $admin->nom = $request['nom'] ?? $admin->nom;
            $admin->prenom=$request['prenom'] ?? $admin->prenom;
            $admin->email=$request['email'] ?? $admin->email;
            $admin->telephone=$request['telephone'] ?? $admin->telephone;

            $admin->save();
            if (isset($request['roles'])){

                $this->editRole($request,$id);
            }


            if (Auth::guard('admins')->id() === $id){
                Auth::guard('admins')->login($admin);
            }

            return redirect()->back()->with('message',"Information de l'admin mise à jour avec succès" );
        }catch (\Exception $exception){
            return redirect()->back()->with('error',"Une erreur est survenue : ");
        }
    }

    public function  updateUserOrAdmin(Request $request,$id){
        if (Auth::guard('admins')->check()){
            $this->updateAdmin($request,$id);

        }else{
            $this->updateUser($request,$id);
        }
    }
}
