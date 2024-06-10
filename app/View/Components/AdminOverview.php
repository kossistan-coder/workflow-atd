<?php

namespace App\View\Components;

use App\Models\Admin;
use Illuminate\View\Component;

class AdminOverview extends Component
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

        $admins = Admin::limit(3)->get();


        return view('components.admin-overview',compact('admins'));
    }
}
