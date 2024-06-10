<?php

namespace App\View\Components;

use App\Models\Admin;
use App\Models\Demande;
use App\Models\User;
use Illuminate\View\Component;

class OverviewCards extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $admins = Admin::all()->count();
        $users = User::all()->count();
        $demandes = Demande::all()->count();
        return view('components.overview-cards',compact('admins','users','demandes'));
    }
}
