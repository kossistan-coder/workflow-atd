<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{

    public function index(){
        $roles = Role::all();

        return view('admins.roles', compact('roles'));

    }

    public function show($id){
        $roles = Role::find($id);

        return view('admins.update-role', compact('roles'));

    }

    public function create(Request $request){
        try {

            if (Auth::guard('admins')->user()->roles->contains('niveau',2)){
                $roles = $request->validate([
                    'description' => 'required|string',
                    'designation' => 'required|string',
                    'niveau' => 'required|string',
                ]);



                Role::create([
                    'description' => $roles['description'],
                    'designation' => $roles['designation'],
                    'niveau' => $roles['niveau'],
                ]);
                return redirect()->back()->with('message',"Role créer avec succès");
            }else {
                return redirect()->back()->with('error',"Vous n'etes pas authorisé à executer cette action");
            }

        }catch (\Exception $e){
            return redirect()->back()->with('error',"Erreur interne du serveur".$e->getMessage());
        }




    }

    public function delete($id){
        try {
            if (Auth::guard('admins')->user()->roles->contains('niveau',2)){
                Role::destroy($id);
                return redirect()->back()->with('message','Role supprimé avec succès');
            }else {
                return redirect()->back('error',"Vous n'etes pas authorisé à executer cette action");
            }
        }catch (\Exception $e){
            return redirect()->back('error',"Erreur interne du serveur");
        }
    }

    public function update(Request $request,$id){
        try {
            if (Auth::guard('admins')->user()->roles->contains('niveau',2)){

                $roles = $request->validate([
                    'designation' => 'sometimes|string|unique:roles,designation,'.$id,
                    'description' => 'sometimes|string',
                ]);

               $role =  Role::find($id);
               $role->designation = $roles['designation'] ?? $role->designation;
               $role->description = $roles['description'] ?? $role->description;

               $role->save();

                return redirect()->route('roles')->with('message','Role Modifié avec succès');
            }else {
                return redirect()->back()->with('error',"Vous n'etes pas authorisé à executer cette action");
            }
        }catch (\Exception $e){
            return redirect()->back()->with('error',"Erreur interne du serveur");
        }
    }
}
