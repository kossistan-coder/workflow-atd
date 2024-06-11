<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\Role;
use App\Repositories\AuthRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    protected $auth;

    public function __construct(AuthRepository $auth){
     $this->auth = $auth;
    }

    public function show(Role $role){

       if(!Auth::guard('admins')->user()->roles->contains('id',2)){
           return redirect()->back()->with('error', 'Invalid Credentials');
       }

       $admins = Admin::paginate(10);
       $roles = Role::all();


        return view('admins.users',['admins'=>$admins,'roles'=>$roles]);
    }

    public function details($id){

        return view('admins.details',[
            'admin'=>Admin::find($id)->load('roles'),
            'authorize'=>Auth::guard('admins')->user()->roles->contains('id',2),
            'roles'=>Role::all(),
            ]);
    }

    public function edit(Request $request, $id){
        $this->auth->updateAdmin($request,$id);

    }

    public  function editRole(Request  $request,$id)
    {
        //return $this->auth->editRole($request,$id);

        if (AdminRole::where('admin_id',$id)->count() > 0){
            AdminRole::where('admin_id',$id)->update(['role_id'=>$request['roles']]);

        }else {

            AdminRole::create(['admin_id'=>$id,'role_id'=>$request['roles']]);

        }

        return redirect()->back()->with('success','Role mise a jour avec succès');
    }
}
