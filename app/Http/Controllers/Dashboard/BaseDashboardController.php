<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseDashboardController extends Controller
{
    public function index()
    {
        if (user()->hasRole("Admin"))
            return to_route("dashboard.admin");
        return inertia('Dashboard');
    }
}
