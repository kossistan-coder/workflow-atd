<?php

namespace App\View\Components;

use App\Models\Demande;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class DemandeCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    protected function getRoles(){
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


    public function render()
    {

        $demande = Demande::all()->load(['statut','informations']);
        $authorized = $this->getRoles();
        return view('components.demande-card', compact('demande','authorized'));
    }
}
