<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminRole;
use App\Models\User;
use App\Models\UserRole;
use App\Repositories\AuthRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    protected $auth;

    public function __construct(AuthRepository $auth){
        $this->auth = $auth;
    }

    public function configuration(){

        if (Auth::guard('web')->check()) {
            return view(
                'admins.config',
                [
                    'auth'=>Auth::guard('web')->user()
            ]
            );
        }else {
            return view(
                'admins.config',
                [
                    'auth'=>Auth::guard('admins')->user()
                ]
            );
        }
    }

    public function updateConfiguration(Request $request,$id){
        $this->auth->updateUserOrAdmin($request,$id);
    }




    public function showLoginForm(){
        return view('admins.login');
    }



    public function login(Request $request){
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);

        if(Auth::guard('admins')->attempt($credentials)){


            $request->session()->put('admin',Auth::guard('admins')->user());

            return redirect()->route('overview');

        }else if (Auth::guard('web')->attempt($credentials)){

            $request->session()->put('user',Auth::guard('web')->user());
            return redirect()->route('overview');

        }

        return redirect()->back()->with('error', 'Invalid Credentials');
    }

    public function logout(Request $request){
        $request->session()->forget('user');
        $request->session()->forget('admin');
        Auth::guard('admins')->logout();
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }

    public function registerUser(Request $request){

        try {
            $credentials = $request->validate([
                'nom'=>'required|string',
                'prenom'=>'required|string',
                'telephone'=>'required|numeric',
                'email'=>'required|email|unique:users',
                'password'=>'required|string|confirmed',
            ]);

            $user =  User::create([
                'nom'=>$request->input('nom'),
                'prenom'=>$request->input('prenom'),
                'telephone'=>$request->input('telephone'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
            ]);

//            foreach ($request->input('roles', []) as $role) {
//                UserRole::create([
//                    'user_id'=>$user->id,
//                    'role_id'=>$role,
//                ]);
//            }

//        Auth::guard('user')->login($user);
//
//        $request->session()->put('user',$user);

            return redirect()->back()->with('message','Utilisateur créer avec succès');
        }catch (\Exception $exception){
            return redirect()->back()->with('error',"Erreur interne du serveur".$exception->getMessage());
        }
    }

    public function registerAdmin(Request $request){

        try {
            $credentials = $request->validate([
                'nom'=>'required|string',
                'prenom'=>'required|string',
                'telephone'=>'required|numeric',
                'email'=>'required|email|unique:admins',
                'password'=>'required|string|confirmed',
            ]);

            $user =  Admin::create([
                'nom'=>$request->input('nom'),
                'prenom'=>$request->input('prenom'),
                'telephone'=>$request->input('telephone'),
                'email'=>$request->input('email'),
                'password'=>Hash::make($request->input('password')),
            ]);

            foreach ($request->input('roles', []) as $role) {
                AdminRole::create([
                    'admin_id'=>$user->id,
                    'role_id'=>$role,
                ]);
            }

//        Auth::guard('admin')->login($user);
//
//        $request->session()->put('user',$user);
//
//        return redirect()->route('overview');
            return redirect()->back()->with('message','Admin créer avec succès');
        }catch (\Exception $exception){
            return redirect()->back()->with('error',"Erreur interne du serveur");
        }
    }
}
