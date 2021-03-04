<?php

namespace App\Http\Controllers;

use App\RestaurantFloor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class RestaurantFloorController extends Controller
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
        $floors = RestaurantFloor::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.sale.floor.index',compact('floors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.restaurant.sale.floor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'required',
            'description' => 'required',
            'positionArray' => 'required',
        );

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('floors.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        }else {
            # code...

            // $positionArray =$request->positionArray;
            // return $positionArray;
            // store
        
            $floor = new RestaurantFloor();
            $floor->name = $request->name;
            $floor->description = $request->description;
            $floor->position_array = $request->positionArray;
            $floor->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
            $floor->user_id = Auth::guard('restaurantUser')->id();
            $floor->save();

            toastr()->success('Added successfully.');
            // redirect
            return redirect()->route('floors.index');

        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RestaurantFloor  $restaurantFloor
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFloor::find($id)->user_id) {
            $floor = RestaurantFloor::find($id);

            $floorTables = json_encode($floor->floorTables->where('del_status', 'Live'));

            return view('pages.restaurant.sale.floor.show', compact('floor', 'floorTables'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RestaurantFloor  $restaurantFloor
     * @return \Illuminate\Http\Response
     */
    public function edit(RestaurantFloor $restaurantFloor)
    {
        return 'edit';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RestaurantFloor  $restaurantFloor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RestaurantFloor $restaurantFloor)
    {
        return 'update';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RestaurantFloor  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(RestaurantFloor $restaurantFloor)
    {
        // return 'delete';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::guard('restaurantUser')->id() == RestaurantFloor::find($id)->user_id) {
            $floor = RestaurantFloor::find($id);
            if ($floor) {
                $floor = RestaurantFloor::find($id);
                $floor->del_status = "Deleted";
                $floor->save();

                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('floors.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('floors.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('floors.index');
        }
    }
}
