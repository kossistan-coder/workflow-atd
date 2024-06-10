<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;

class UserDemandeOverview extends Component
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

        $users = User::limit(7)->get()->load('demandes');
        return view('components.user-demande-overview',compact('users'));
    }
}
