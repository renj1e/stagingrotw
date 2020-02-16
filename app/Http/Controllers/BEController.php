<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BEController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	if(\Auth::user()->utype !== 'staff')
        {
        	return redirect('/');
        }

        $riders = DB::table('users')
            ->where('utype',  'rider')
            ->join('rider_status', 'rider_status.rider_status_rider_id', '=', 'users.id')
            ->join('rider_profile', 'rider_profile.rider_profile_rider_id', '=', 'users.id')
            ->join('rider_contact', 'rider_contact.rider_contact_rider_id', '=', 'users.id')
            ->where('rider_status.rider_status_status', '!=', 'not_active')
            ->select('users.*', 'rider_status.rider_status_status', 'rider_status.rider_status_id', 'rider_profile.rider_profile_address', 'rider_contact.rider_contact_type', 'rider_contact.rider_contact_number')
            ->get();

        $customers = DB::table('users')
            ->where('users.utype', '=', 'customer')
            ->join('order_track', 'order_track.order_trackcustomerid', '=', 'users.id')
            ->join('customer_address', 'customer_address.caid', '=', 'order_track.order_trackdelivery_addressid')
            ->select('users.id', 'users.name', 'order_track.*', 'customer_address.*')
            ->get();
            
            // dd($customers);

        return view('be/index',
        	[
        		'riders' => $riders,
        		'customers' => $customers
        	]
        );
    }
}
