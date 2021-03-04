<?php

namespace App\Http\Controllers;

use App\Country;
use App\Restaurant;
use App\RestaurantCategoryForSupplier;
use App\RestaurantIngredientCategory;
use App\RestaurantSupplier;
use App\RestaurantPurchase;
use App\RestaurantIngredient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;

class RestaurantSuppliersController extends Controller
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
        $suppliers = RestaurantSupplier::with('categories:id,name')->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        // return $suppliers;
        return view('pages.restaurant.purchase.supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.restaurant.purchase.supplier.create', compact('categories', 'countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $rules = array(
            'name' => 'required',
            'contact_person' => 'required',
            'phone' => 'required',
            'country' => 'required|numeric',
            'state' => 'required|numeric',
            'city' => 'required|numeric',
            'category' => 'required',
            'order_method' => 'required'
        );

        $request->email ? $rules['email'] = 'required|email:rfc,dns,strict' : '';
        $request->fax ? $rules['fax'] = 'required' : '';
        $request->bank_name ? $rules['bank_name'] = 'required|regex:/^[\pL\s\-]+$/u' : '';
        $request->account_number ? $rules['account_number'] = 'required|numeric' : '';
        $request->routing_number ? $rules['routing_number'] = 'required|numeric' : '';
        $request->zip ? $rules['zip'] = 'required' : '';
        $request->address ? $rules['address'] = 'required' : '';
        $request->description ? $rules['description'] = 'required' : '';
        // $request->category ? $rules['category'] = 'required|numeric' : '';
        $request->order_method ? $rules['order_method'] = 'required' : '';

        $request->country ? $rules['country'] = 'required|numeric' : '';
        $request->state ? $rules['state'] = 'required|numeric' : '';
        $request->city ? $rules['city'] = 'required|numeric' : '';

        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->route('suppliers.create')
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            $category = RestaurantIngredientCategory::find($request->category);

            if ($category) {
                $supplier = new RestaurantSupplier();
                $supplier->name = $request->name;
                $supplier->contact_person = $request->contact_person;
                $supplier->phone = $request->phone;
                $supplier->email = $request->email;
                $supplier->fax = $request->fax;
                $supplier->bank_name = $request->bank_name;
                $supplier->account_number = $request->account_number;
                $supplier->routing_number = $request->routing_number;
                $supplier->zip = $request->zip;

                $supplier->address = $request->address;
                $supplier->description = $request->description;
                // $supplier->category_id = $request->category;

                $supplier->country_id = $request->country;
                $supplier->state_id = $request->state;
                $supplier->city_id = $request->city;

                $supplier->order_method = json_encode($request->order_method);
                $supplier->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                $supplier->user_id = Auth::guard('restaurantUser')->id();
                $supplier->save();

                if (is_countable($request->input('category'))) {
                    for ($i = 0; $i < count($request->input('category')); $i++) {
                        $supplier_category = new RestaurantCategoryForSupplier;
                        $supplier_category->category_id  = $request->category[$i];
                        $supplier_category->supplier_id  = $supplier->id;
                        $supplier_category->save();
                    }
                }

                toastr()->success('Added successfully.');
                // redirect
                return redirect()->route('suppliers.index');
            } else {
                toastr()->error('Invalid category found.');
                return redirect()->route('suppliers.create');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::guard('restaurant')->id() === RestaurantSupplier::find($id)->created_by) {
            $supplier = RestaurantSupplier::where('id', $id)
                                            ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
                                            ->first();

            $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
            $categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();


            return view('pages.restaurant.purchase.supplier.edit', compact('supplier', 'categories', 'countries'));
        } else {
            toastr()->error('You are not allowed to show this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('suppliers.index');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request->all();
        if (Auth::guard('restaurant')->id() === RestaurantSupplier::find($id)->created_by) {
            $rules = array(
                'name' => 'required',
                'contact_person' => 'required',
                'phone' => 'required',
                'country' => 'required|numeric',
                'state' => 'required|numeric',
                'city' => 'required|numeric',
                'category' => 'required',
                'order_method' => 'required'
            );

            $request->email ? $rules['email'] = 'required|email:rfc,dns,strict' : '';
            $request->fax ? $rules['fax'] = 'required' : '';
            $request->bank_name ? $rules['bank_name'] = 'required|regex:/^[\pL\s\-]+$/u' : '';
            $request->account_number ? $rules['account_number'] = 'required|numeric' : '';
            $request->routing_number ? $rules['routing_number'] = 'required|numeric' : '';
            $request->address ? $rules['address'] = 'required' : '';
            $request->description ? $rules['description'] = 'required' : '';
            // $request->category_id ? $rules['category_id'] = 'required' : '';
            $request->order_method ? $rules['order_method'] = 'required' : '';
            $request->zip ? $rules['zip'] = 'required' : '';


            $validator = Validator::make(\request()->all(), $rules);

            // process the creation
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput(\request()->all());
            } else {
                // store
                $category = RestaurantIngredientCategory::find($request->category);

                if ($category) {
                    $supplier = RestaurantSupplier::find($id);
                    $supplier->name = $request->name;
                    $supplier->contact_person = $request->contact_person;
                    $supplier->phone = $request->phone;
                    $supplier->email = $request->email;
                    $supplier->fax = $request->fax;
                    $supplier->bank_name = $request->bank_name;
                    $supplier->account_number = $request->account_number;
                    $supplier->routing_number = $request->routing_number;
                    $supplier->address = $request->address;
                    $supplier->description = $request->description;
                    // $supplier->category_id = $request->category;

                    $supplier->zip = $request->zip;

                    $supplier->country_id = $request->country;
                    $supplier->state_id = $request->state;
                    $supplier->city_id = $request->city;


                    $supplier->order_method = json_encode($request->order_method);
                    $supplier->restaurant_id = Auth::guard('restaurantUser')->user()->restaurant_id;
                    $supplier->user_id = Auth::guard('restaurantUser')->id();
                    $supplier->save();

                    if (is_countable($request->input('category'))) {
                        if (RestaurantCategoryForSupplier::where('supplier_id', $supplier->id)->get()) {
                            RestaurantCategoryForSupplier::where('supplier_id', $supplier->id)->delete();
                        }
                        for ($i = 0; $i < count($request->input('category')); $i++) {
                            $menu_shift = new RestaurantCategoryForSupplier;
                            $menu_shift->category_id = $request->category[$i];
                            $menu_shift->supplier_id = $supplier->id;
                            $menu_shift->save();
                        }
                    }

                    toastr()->success('Updated successfully.');
                    // redirect
                    return redirect()->route('suppliers.index');
                } else {
                    toastr()->error('Invalid category found.');
                    return redirect()->back();
                }
            }
        } else {
            toastr()->error('You are not allowed to update this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('suppliers.index');
        }
    }

    /**
     * send tet/mail to multiple supplier
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sendTextMail(Request $request)
    {

        $suppliers_id   = $request->suppliers_id;
        $message        = $request->message;

        return ['success' => $suppliers_id, 'message' => $message];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        if (Auth::guard('restaurant')->id() === RestaurantSupplier::find($id)->created_by) {
            $supplier = RestaurantSupplier::find($id);
            if ($supplier) {
                $supplier = RestaurantSupplier::find($id);
                $supplier->del_status = "Deleted";
                $supplier->save();

                RestaurantCategoryForSupplier::where('supplier_id', $supplier->id)->update(['del_status' => 'Deleted']);


                toastr()->success('Deleted successfully.');
                // redirect
                return redirect()->route('suppliers.index');
            } else {
                toastr()->error('Unable to delete.');
                // redirect
                return redirect()->route('suppliers.index');
            }
        } else {
            toastr()->error('You are not allowed to delete this resource because this is not belongs to you.');
            // redirect
            return redirect()->route('suppliers.index');
        }
    }

    public function detailsAll($id)
    {

        $res_id = Auth::guard('restaurant')->id();
        $supplier = RestaurantSupplier::where('id',$id)->get();
        // $supplier = RestaurantSupplier::where('id', $id)
        //                                     ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
        //                                     ->first();

        //$categories = RestaurantIngredientCategory::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        $purchases=RestaurantPurchase::where('supplier_id', $id)
           ->where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)->where('del_status', 'Live')
           ->get();
       return view('pages.restaurant.purchase.supplier.details', compact('supplier','purchases'));

        //return view('pages.restaurant.purchase.supplier.details');

    }


}
