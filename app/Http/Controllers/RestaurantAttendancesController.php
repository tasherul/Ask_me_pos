<?php

namespace App\Http\Controllers;

use App\RestaurantAttendance;
use App\RestaurantUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantAttendancesController extends Controller
{
    public function __construct()
    {
        $this->middleware('restaurantUser');
        auth()->setDefaultDriver('restaurantUser');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = RestaurantAttendance::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                            ->where('del_status', 'Live')
                                            ->orderBy('updated_at', 'desc')
                                            ->get();

        // $attendances = RestaurantAttendance::leftJoin('tbl_restaurant_users', 'tbl_restaurant_users.id', '=', 'tbl_restaurant_attendances.employee_id')
        //                                     ->orderBy('tbl_restaurant_users.manager_name', 'asc')
        //                                     ->orderBy('tbl_restaurant_users.id', 'asc')
        //                                     ->where('tbl_restaurant_attendances.restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
        //                                     ->where('tbl_restaurant_attendances.del_status', 'Live')
        //                                     ->select('tbl_restaurant_attendances.*', 'tbl_restaurant_users.manager_name', 'tbl_restaurant_users.id') //see PS:
        //                                     ->get();

        $employees = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->get();
        
        // return $attendances;

        return view('pages.restaurant.attendance.index', compact('attendances', 'employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastId = RestaurantAttendance::select('reference_no')->orderBy('created_at', 'desc')->first();
        $nextId = "000001";

        if ($lastId) {
            $lastId = $lastId->reference_no;
            $idNum = (int)$lastId;
            $nextId = $idNum + 1;
            $nextId = (string)$nextId;

            switch (strlen($nextId)) {
                case 1:
                    $nextId = "00000" . $nextId;
                    break;
                case 2:
                    $nextId = "0000" . $nextId;
                    break;
                case 3:
                    $nextId = "000" . $nextId;
                    break;
                case 4:
                    $nextId = "00" . $nextId;
                    break;
                case 5:
                    $nextId = "0" . $nextId;
                    break;
                default:
                    $nextId = $nextId;
            }
        }

        $employees = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.attendance.create', compact('nextId', 'employees'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $rules = array(
            'date' => 'required|date',
            'in_time' => 'required',
            'out_time' => 'required',
            'employee_id' => 'required|numeric',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('attendances.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $attendance = new RestaurantAttendance;
            $attendance->reference_no = $request->reference_no;
            $attendance->employee_id = $request->employee_id;
            $attendance->date = $request->date;
            $attendance->in_time = $request->in_time;
            $attendance->out_time = $request->out_time;
            $attendance->note = $request->note;
            $attendance->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $attendance->user_id = Auth::guard('restaurantUser')->id();
            $attendance->save();
            // return $attendance;

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('attendances.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Auth::guard('restaurantUser')->id() == RestaurantAttendance::find($id)->user_id) {

            $attendance = RestaurantAttendance::find($id);
            $employees = RestaurantUser::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();

            return view('pages.restaurant.attendance.edit', compact('attendance', 'employees'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('attendances.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        $rules = array(
            'date' => 'required|date',
            'in_time' => 'required',
            'out_time' => 'required',
            'employee_id' => 'required|numeric',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('attendances.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
    
            if (Auth::guard('restaurantUser')->id() == RestaurantAttendance::find($id)->user_id) {

                $attendance = RestaurantAttendance::find($id);
                
                if ($attendance) {
                    
                    // store
                    $attendance->employee_id = $request->employee_id;
                    $attendance->date = $request->date;
                    $attendance->in_time = $request->in_time;
                    $attendance->out_time = $request->out_time;
                    $attendance->note = $request->note;
                    $attendance->save();
                    // return $attendance;
                    
                    toastr()->success('Updated  successfully.');
                    // redirect
                    return redirect()->route('attendances.index');
                    
                } else {
                    toastr()->error('Unable to Updated.');
                    // redirect
                    return redirect()->route('attendances.index');
                }
            } else {
                toastr()->error('You are not allowed to Edit this resource because this is not belongs to you.');
                // redirect
                return redirect()->route('attendances.index');
            }


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantAttendance::find($id)->user_id) {
            $attendance = RestaurantAttendance::find($id);
            if ($attendance) {
                $attendance->del_status = "Deleted";
                $attendance->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('attendances.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('attendances.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('attendances.index');
        }
    }
}
