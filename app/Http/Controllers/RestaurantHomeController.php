<?php

namespace App\Http\Controllers;

use App\RestaurantUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RestaurantHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('restaurantUser');
        auth()->setDefaultDriver('restaurantUser');
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function home()
    {
        return view('pages.restaurant.home');
    }

    public function staff(){
        $role=DB::table('tbl_super_admins_role')
            ->get();

        return view('pages.restaurant.Staff.add_staff',compact('role'));
    }
    public  function  addstaff(Request $request){
        $add_by = Auth::guard('restaurantUser')->user()->restaurant_id;
        $restaurantUser = new RestaurantUser;
        $restaurantUser->manager_name = $request->manager_name;
        $restaurantUser->manager_phone = $request->manager_phone;
        $restaurantUser->manager_email = $request->manager_email;
        $restaurantUser->password = bcrypt($request->manager_password);
        $restaurantUser->role_id = $request->role_id;
        $restaurantUser->restaurant_id = $add_by;
        $restaurantUser->save();
        return redirect('restaurant/staff-restaurant');
    }
    public function allstaff(){
        /*$staff= RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
            ->get();*/
        $staff = DB::table('tbl_restaurant_users')
            ->join('tbl_super_admins_role','tbl_restaurant_users.role_id','=','tbl_super_admins_role.id')
            ->where('tbl_restaurant_users.restaurant_id','=',Auth::guard('restaurantUser')->user()->restaurant_id)
            ->select('tbl_restaurant_users.*','tbl_super_admins_role.user_name as roleName')
            ->get();
       return view('pages.restaurant.Staff.all_staff', compact('staff'));
    }
    public function deletestaff($id){
        DB::table('tbl_restaurant_users')->where('id', $id)->delete();
        return back();
    }
    public function editstaff($id){
        $role=DB::table('tbl_super_admins_role')
            ->get();
        $all_data=DB::table('tbl_restaurant_users')
            ->where('id',$id)
            ->first();
        return view('pages.restaurant.Staff.edit_staff',compact('all_data','role'));
    }
    public function updatesatff(Request $request){
        $id = $request->id;
        $data = array(
            'manager_name' => $request->manager_name,
            'manager_phone' => $request->manager_phone,
            'manager_email' =>$request-> manager_email,
            'password' => bcrypt($request->manager_password),
            'role_id' =>$request-> role_id,
        );
        DB::table('tbl_restaurant_users')
            ->where('id', $id)
            ->update($data);

       return redirect('restaurant/all-staff-restaurant');

    }

    //-----------------role------------------
    public function role(){
        $all_rople=DB::table('tbl_super_admins_role')
            ->get();
        return view('pages.restaurant.role.role',compact('all_rople'));
    }
    public function addrole(){

        $all_data=DB::table('tbl_super_admins_role')->get();
        return view('pages.restaurant.role.add_role',compact('all_data'));
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

        return redirect('restaurant/add_role');
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
        return view('pages.restaurant.role.edit_role',compact('all_data'));
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
