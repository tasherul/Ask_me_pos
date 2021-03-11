<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\RestaurantUser;

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
    public function roleinsert(Request $request){
        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $data = array(
            'user_name' => $request->user_name,
            'description' =>$request->description,
            'del_status' =>$request->del_status,
            'restaurant_id' => $add_by,
        );
       DB::table('tbl_super_admins_role')->insert($data);

       return redirect('SuperAdmin/add_role');
//        echo $add_by;
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
    public function staff(){
        $role=DB::table('tbl_super_admins_role')
            ->get();
        return view('pages.superAdmin.Staff.add_staff',compact('role'));
    }
    public  function  addstaff(Request $request){
        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $restaurantUser = new RestaurantUser;
        $restaurantUser->manager_name = $request->manager_name;
        $restaurantUser->manager_phone = $request->manager_phone;
        $restaurantUser->manager_email = $request->manager_email;
        $restaurantUser->password = bcrypt($request->manager_password);
        $restaurantUser->restaurant_id = $add_by;
        $restaurantUser->save();
        return redirect('SuperAdmin/Staff');
    }

}
