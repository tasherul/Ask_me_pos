<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
