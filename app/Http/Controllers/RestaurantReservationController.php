<?php

namespace App\Http\Controllers;

use App\Classes\Sms;
use App\Customer;
use App\CustomerReservation;
use App\Mail\MessageByMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DataTables;
use Exception;
use Illuminate\Support\Facades\Mail;

class RestaurantReservationController extends Controller
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
    public function reservation( Request $request)
    {
        
        // return url()->current();
        if ($request->ajax()) {

            if(!empty($request->from_date))
            {   
                $reservation = CustomerReservation::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                                    ->where('del_status', 'Live')
                                                    ->orderBy('updated_at', 'desc')
                                                    ->whereBetween('booking_date', array($request->from_date, $request->to_date))
                                                    ->get();

                
            }else{
                # code...
                $reservation = CustomerReservation::where('restaurant_id', Auth::guard('restaurantUser')->user()->restaurant_id)
                                                    ->where('del_status', 'Live')
                                                    ->orderBy('updated_at', 'desc')
                                                    ->get();
                
            }
            return DataTables::of($reservation)
                            ->addIndexColumn()
                            ->addIndexColumn('customer_id',function($reservation){
                                return $reservation->customer->id;
                            
                            })
                            ->addColumn('name', function($reservation){
                                return $reservation->customer->name;
                            
                            })
                            ->addColumn('email', function($reservation){
                                return $reservation->customer->email;
                            
                            })
                            ->addColumn('phone', function($reservation){
                                return $reservation->customer->phone;
                            
                            })
                            ->addColumn('booking_date', function($reservation){
                                return $reservation->booking_date;
                            
                            })
                            ->addColumn('number_of_people', function($reservation){
                                return $reservation->number_of_people;
                            
                            })
                            ->addColumn('table_id', function($reservation){
                                $tables = explode(',', $reservation->table_id);
                                $tables_name = '';
                                foreach ($tables as $key => $table_id) {
                                    if (!$tables_name == '') {
                                        $tables_name = $tables_name.', '.getRestaurantTableNameById($table_id);
                                    }else {
                                        $tables_name .= getRestaurantTableNameById($table_id);
                                    }
                                }

                                return $tables_name;
                                //return $reservation->table_id;
                            
                            })
                            ->make(true);
        
        }

        

        return view('pages.restaurant.reservation.index');
        
        // return view('pages.restaurant.sale.customer.index', compact('customers'));
    }


    /**
     * send tet/mail to multiple customer
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function sendTextMail(Request $request)
    {
        
        
        //return $request->all();
        $customers_id   = $request->customers_id;
        $message        = $request->message;
        $text_email     = $request->text_email;
        //return $text_email;//json_encode($request->text_email);
        $customers= $customers_id;
        $errors = [];

        foreach ($customers_id as $key => $customer_id) {
            $customer = Customer::select('phone', 'email', 'name')->where('id', $customer_id)->where('del_status', 'Live')->first();
            if ($customer) {
                $customer['message'] = $message;

                foreach ($text_email as $key => $messageBy) {
                    if ($messageBy == 'email') {
                        # code...
                        Mail::to($customer->email)->send(new MessageByMail($customer));
                    }
                    if ($messageBy == 'sms') {
                        $sms = new Sms;
                        $client = $sms->twilioClient();
                        try
                        {
                            // Use the client to do fun stuff like send text messages!
                            $client->messages->create($customer->phone, array('from' => Sms::PHONE_NUMBER, 'body' => $message));
                        }
                        catch (Exception $e)
                        {
                            $errors[] = $e->getMessage();
                            
                        }


                    }
                }

            }
        }

        return ['success' => 'message succefully send', 'errors' => $errors,'customers'=> $customers, 'message' => $message];
    }




}
