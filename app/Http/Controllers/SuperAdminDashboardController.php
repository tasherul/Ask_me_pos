<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
        auth()->setDefaultDriver('superAdmin');
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function dashboard()
    {
        return view('pages.superAdmin.dashboard');
    }
}
