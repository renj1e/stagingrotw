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
    	if(\Auth::user()->utype === 'customer')
        {
        	return redirect('/dashboard');
        }
        if(\Auth::user()->utype === 'rider')
        {
            return redirect('/admin/rider');
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

        return view('be/index',
        	[
        		'riders' => $riders,
        		'customers' => $customers
        	]
        );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function rider()
    {
        if(\Auth::user()->utype === 'staff')
        {
            return redirect('/admin');
        }
        if(\Auth::user()->utype === 'customer')
        {
            return redirect('/dashboard');
        }

        $orders = DB::table('order_track')
            // ->where('order_track.order_track_riderid', \Auth::user()->id)
            ->where('order_track.order_trackstatus', '=', 'order_confirmed_and_received')
            ->join('users', 'users.id', '=', 'order_track.order_trackcustomerid')
            ->join('customer_address', 'customer_address.caid', '=', 'order_track.order_trackdelivery_addressid')
            ->select('order_track.*', 'users.id', 'users.name', 'customer_address.*')
            ->get();


        foreach ($orders as $k => $v) {
        	$_o = [];
        	if($v->order_trackorderid !== '{}')
        	{
	        	$_ik = explode(',', str_replace(array('[',']'), '', $v->order_trackorderid));

	        	foreach ($_ik as $id => $val) {
	        		$_oid = (int) str_replace(array('"'), '', $val);

	        		$_order_details = DB::table('order')
			            ->where('orderid', $_oid)
			            ->join('menus', 'menus.menuid', 'order.ordermenuid')
			            ->join('vendors', 'vendors.vendorid', 'menus.vendorid')
			            ->select('order.*', 'menus.*', 'vendors.*')
			            ->first();
	        		array_push($_o, $_order_details);
	        	}

	        	$_all_orders = $orders[$k]->orders = $_o;

		        foreach ($_all_orders as $k => $v) {
		        	$addons = [];
		        	if($v->orderaddons !== '{}')
		        	{
			        	$_ik = explode(',', str_replace(array('{','}'), '', $v->orderaddons));

			        	foreach ($_ik as $id => $val) {
			        		$_nik = explode(':', $val);
			        		$_nik_id = (int) str_replace(array('"'), '', $_nik[0]);
			        		$_nik_q = (int) str_replace(array('"'), '', $_nik[1]);
			        		$_addons_details = DB::table('addons')
					            ->where('addid', $_nik_id)
					            ->first();
					        $_addons_details->q = $_nik_q;

			        		array_push($addons, $_addons_details);
			        	}
			        	$_all_orders[$k]->addons = $addons;
		        	}
		        }


        	}
        }

            // dd($orders);
        return view('be/index-rider',
        	[
        		'orders' => $orders,
        	]
        );
    }
}
