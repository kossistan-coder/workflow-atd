<?php

namespace App\View\Components;

use App\Models\Role;
use Illuminate\View\Component;

class RoleDropDown extends Component
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

        $roles = Role::all();
        return view('components.role-drop-down',['roles'=>$roles]);
    }
}
