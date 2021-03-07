<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdminRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
        auth()->setDefaultDriver('superAdmin');
    }
    public function role(){

        return view('pages.superAdmin.role');
    }
    public function addrole(){
        //echo"asdasd";
       return view('pages.superAdmin.add_role');
    }
}
