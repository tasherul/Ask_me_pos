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

    public function otherlist(){
        return view('pages.superAdmin.outher_list.outher_list');
    }
    public function allService(){
        return view('pages.superAdmin.all_service.all_service');
    }
    public function sale(){
        return view('pages.superAdmin.Sale.sale');
    }
    public function inventory(){
        return view('pages.superAdmin.Inventory.Inventory');
    }
    public function inventoryadjustment(){
        return view('pages.superAdmin.Inventory_adjustment.Inventory_adjustment');
    }
    public function waste(){
        return view('pages.superAdmin.Waste.waste');
    }

}
