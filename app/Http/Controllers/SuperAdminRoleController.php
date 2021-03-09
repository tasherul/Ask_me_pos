<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuperAdminRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('superAdmin');
        auth()->setDefaultDriver('superAdmin');
    }
    public function role(){
        $all_rople=DB::table('tbl_super_admins_role')
            ->get();
        return view('pages.superAdmin.role',compact('all_rople'));
    }
    public function addrole(){

        $all_data=DB::table('tbl_super_admins_role')->get();
        return view('pages.superAdmin.add_role',compact('all_data'));
    }
    public function role_insert(Request $request){
//        $add_by = Auth::guard('restaurantUser')->id();
        $data = array(
            'user_name' => $request->user_name,
            'description' =>$request->description,
            'del_status' =>$request->del_status,

        );
       DB::table('tbl_super_admins_role')->insert($data);

       return redirect('SuperAdmin/subcreate');
    }

    public function delete_role($id){
        DB::table('tbl_super_admins_role')->where('id', $id)->delete();
        return back()->with('deleted','Sucessfully Deleted.');
    }
    public function edit_role($id){
        $all_data=DB::table('tbl_super_admins_role')
            ->where('id',$id)
            ->first();
        return view('pages.superAdmin.edit_role',compact('all_data'));
    }
    public function updaterole(Request $request){
        $id = $request->id;
        $data = array(
            'user_name' => $request->user_name,
            'description' => $request->description,
            'del_status' =>$request-> del_status,
        );
        DB::table('tbl_super_admins_role')
            ->where('id', $id)
            ->update($data);
        return back();
    }

}
