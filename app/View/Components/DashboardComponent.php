<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DashboardComponent extends Component
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
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        if (user()->hasRole('Admin'))
            $routeDashboard = "dashboard.admin";
        else if (user()->hasRole('kasir'))
            $routeDashboard = "dashboard-kasir";
        return view('components/menu/dashboard-menu', compact("routeDashboard"));
    }
}
