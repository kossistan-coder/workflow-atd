<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Auth;

class RoleRepository
{
    public function getRoles(){
        if (Auth::guard('admins')->user()->roles->contains('niveau',2)){
            //super-admin
            return  2;
        }elseif (Auth::guard('admins')->user()->roles->contains('niveau',3)){
            //Ressources
            return  3;
        }elseif (Auth::guard('admins')->user()->roles->contains('niveau',4)){
            //Superviseur
            return 4;
        }else if(Auth::guard('admins')->user()->roles->contains('niveau',1)){
            //Client
            return 1 ;
        }
    }
}
