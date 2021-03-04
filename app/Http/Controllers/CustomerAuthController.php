<?php

namespace App\Http\Controllers;

use App\Classes\ServiceWorker;
use App\Country;
use App\Customer;
use App\Mail\CustomerVerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class CustomerAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
        $this->serviceWorker = new ServiceWorker;
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function showSignUpForm()
    {
        $countries = Country::where('del_status', 'Live')->orderBy('updated_at', 'desc')->get();
        return view('pages.customer.signup', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function doSignUp(Request $request)
    {
        //return $request->all();
        $rules = array(
            'name' => 'required',
            'phone' => 'required|unique:tbl_customers,phone',
            'email' => 'required|email:rfc,dns,strict|unique:tbl_customers,email',
            'password' => 'required|min:6|max:12|confirmed',
        );
        $validator = Validator::make(\request()->all(), $rules);

        // process the creation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(\request()->all());
        } else {
            // store
            //return $request->all();
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->password = bcrypt($request->password);
            $customer->email_verification_token = Str::random(32);
            $customer->save();
            //return $customer;

            Mail::to($customer->email)->send(new CustomerVerificationEmail($customer));

            toastr()->success('Signed up successfully. Please check your email to activate the account.');
            // redirect
            return redirect()->route('customer.showSignUpForm');
            
        }
    }

    public function customerVerifyEmail($token = null)
    {
        if ($token == null) {
            toastr()->error('Invalid Login attempt.');
            return redirect()->route('customer.showLoginForm');
        }

        $customer = Customer::where('email_verification_token', $token)->first();

        if ($customer == null) {
            toastr()->error('No restaurant is associated with this email.');
            return redirect()->route('customer.showLoginForm');
        } else {
            $statusMsg = null;
            if ($customer->email_verified) {
                $statusMsg = "Already been verified successfully.";
            } else {
                $customer->email_verified = true;
                $customer->email_verified_at = Carbon::now();
                $customer->save();

                $statusMsg = "Verified successfully.";
            }

            toastr()->success($statusMsg);
            return redirect()->route('customer.showLoginForm');
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function doLogin(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'email_phone' => 'required',
            'password' => 'required'
        ]);

        $credentialsType1 = ['email' => $request->email_phone, 'password' => $request->password, 'email_verified' => 1];
        $credentialsType2 = ['phone' => $request->email_phone, 'password' => $request->password, 'email_verified' => 1];

        if (Auth::guard('customer')->attempt($credentialsType1)) {
            toastr()->success('Login success.');
            return redirect()->route('index');
            return 'Login success.';
        } else if (Auth::guard('customer')->attempt($credentialsType2)) {
            toastr()->success('Login success.');
            return redirect()->route('index');
            return 'Login success.';
        } else {
            toastr()->error('Invalid credentials!');
            return redirect()->route('customer.showSignUpForm')->withInput();
        }
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function doLoginByAjax(Request $request)
    {
        //return $request;
        $this->validate($request, [
            'email_phone' => 'required',
            'password' => 'required'
        ]);

        $credentialsType1 = ['email' => $request->email_phone, 'password' => $request->password, 'email_verified' => 1];
        $credentialsType2 = ['phone' => $request->email_phone, 'password' => $request->password, 'email_verified' => 1];
        

        if (Auth::guard('customer')->attempt($credentialsType1)) {
            //toastr()->success('Login success.');
            return response()->json(['success'=> 'Login credentialsType1.']);
        } else if (Auth::guard('customer')->attempt($credentialsType2)) {
            //toastr()->success('Login success.');
            return response()->json(['success'=> 'Login credentialsType2.']);
        } else {
            toastr()->error('Invalid credentials!');
            return response()->json(['error'=> 'Invalid credentials!']);
            // return redirect()->route('customer.showSignUpForm')->withInput();
        }
    }

    /**
     * Handle an incoming request.
     *
     * @return mixed
     */
    public function logout()
    {
        Auth::guard('customer')->logout();
        toastr()->success('Logout successfully.');
        return redirect()->route('customer.showSignUpForm');
    }



}
