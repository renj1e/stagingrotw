<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

// Models
use \App\Order;
use \App\CustomerAddress;
use \App\OrderTrack;

class FEController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('fe/index');
    }

    public function dashboard()
    {
        $this->middleware('auth');

    	if(isset(\Auth::user()->id))
    	{
			$address = DB::table('customer_address')
	            ->where('cacustomerid', \Auth::user()->id)
	            ->get();

	        return view('fe/dashboard',
	        	[
	        		'address' => $address
	        	]
	    	);
    	}
    }

    public function menu(Request $request)
    {
    	$search_q = $request->input('q');
    	$search_meal = $request->input('meal');
    	if($search_meal)
    	{
    		switch ($search_meal)
    		{

    			case 'all-time-meal':
    				$meal = 1;
    				break;

    			case 'breakfast':
    				$meal = 2;
    				break;

    			case 'lunch':
    				$meal = 3;
    				break;

    			case 'dinner':
    				$meal = 4;
    				break;

    			case 'merienda':
    				$meal = 5;
    				break;
    			
    			default:
    				$meal = 0;
    				break;
    		}
    		if($search_q)
    		{
	    		$lists = DB::table('menus')
	    			->whereJsonContains('menus.mtype', $meal)
	            	->where('menus.mname', 'like', '%'.$search_q.'%')
	            	->where('menus.mis_activated', 1)
		            ->join('vendors', 'vendors.vendorid', '=', 'menus.vendorid')
		            ->select('menus.*', 'vendors.vname', 'vendors.vstreet', 'vendors.vcity', 'vendors.vprovince', 'vendors.vcountry')
		            ->get();
    		}
    		else
    		{
	    		$lists = DB::table('menus')
	    			->whereJsonContains('menus.mtype', $meal)
	            	->where('menus.mis_activated', 1)
		            ->join('vendors', 'vendors.vendorid', '=', 'menus.vendorid')
		            ->select('menus.*', 'vendors.vname', 'vendors.vstreet', 'vendors.vcity', 'vendors.vprovince', 'vendors.vcountry')
		            ->get();
    		}
    	}
    	else
    	{
    		if($search_q)
    		{
	    		$lists = DB::table('menus')
	            	->where('menus.mis_activated', 1)
	            	->where('menus.mname', 'like', '%'.$search_q.'%')
		            ->join('vendors', 'vendors.vendorid', '=', 'menus.vendorid')
		            ->select('menus.*', 'vendors.vname', 'vendors.vstreet', 'vendors.vcity', 'vendors.vprovince', 'vendors.vcountry')
		            ->get();
		    }
		    else
		    {
	    		$lists = DB::table('menus')
	            	->where('menus.mis_activated', 1)
		            ->join('vendors', 'vendors.vendorid', '=', 'menus.vendorid')
		            ->select('menus.*', 'vendors.vname', 'vendors.vstreet', 'vendors.vcity', 'vendors.vprovince', 'vendors.vcountry')
		            ->get();
		    }
    	}

    	// Get all menu
    	$cnt_lists = collect();
		$cnt_lists->all = DB::table('menus')
			->where('menus.mis_activated', 1)
            ->join('vendors', 'vendors.vendorid', '=', 'menus.vendorid')
            ->select('menus.*', 'vendors.vname', 'vendors.vstreet', 'vendors.vcity', 'vendors.vprovince', 'vendors.vcountry')
            ->count();
            
        // Get all time meal
		$cnt_lists->all_time = $this->_getMenuCnt(1);
            
        // Get all breakfast meal
		$cnt_lists->breakfast = $this->_getMenuCnt(2);
            
        // Get all lunch meal
		$cnt_lists->lunch = $this->_getMenuCnt(3);

        // Get all dinner meal
		$cnt_lists->dinner = $this->_getMenuCnt(4);

        // Get all merienda meal
		$cnt_lists->merienda = $this->_getMenuCnt(5);

        return view('fe/menu',
        	[
        		'search_meal' => ($search_meal)? $search_meal : '',
        		'search_q' => ($search_q)? $search_q : '',
        		'lists' => $lists,
        		'cnt_lists' => $cnt_lists
	        ]
	    );
    }

    private function _getMenuCnt($mtype)
    {
    	return DB::table('menus')
			->whereJsonContains('menus.mtype', $mtype )
            ->where('menus.mis_activated', 1)
            ->join('vendors', 'vendors.vendorid', '=', 'menus.vendorid')
            ->select('menus.*', 'vendors.vname', 'vendors.vstreet', 'vendors.vcity', 'vendors.vprovince', 'vendors.vcountry')
            ->count();
    }

    public function contact()
    {
        return view('fe/contact');
    }

    public function trackorder()
    {
		$trackorders = DB::table('order')
            ->where('ordercustomerid',  \Auth::user()->id)
            ->where('order_status', 'processing')
            ->join('menus', 'menus.menuid', '=', 'order.ordermenuid')
            ->select('menus.*', 'order.*')
            ->get();

        foreach ($trackorders as $k => $v) {
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
	        	$trackorders[$k]->addons = $addons;
        	}
        }
        // dd($trackorders);

        return view('fe/track-order',
        	[
        		'trackorders' => $trackorders
        	]
        );
    }

    public function menuDetails($id)
    {
		$menu_details = DB::table('menus')
            ->where('menuid', $id)
            ->join('vendors', 'vendors.vendorid', '=', 'menus.vendorid')
            ->select('menus.*', 'vendors.vname', 'vendors.vstreet', 'vendors.vcity', 'vendors.vprovince', 'vendors.vcountry')
            ->first();

		$menu_adds = DB::table('addons')
            ->where('addmenuid', $id)
            ->get();

        return view('fe/menu-details',
        	[
        		'menu' => $menu_details,
        		'addons' => $menu_adds
        	]
    	);
    }

    public function addOrderandTrack(Request $request)
    {
    	$order = new Order;
        $data = $request->all();
        return response()->json($order->new($data));
    }

    public function confirmOrder(Request $request)
    {
    	$confirm = new OrderTrack;
        $data = $request->all();
        return response()->json($confirm->new($data));
    }

    public function addNewAddress(Request $request)
    {
    	$address = new CustomerAddress;
        $data = $request->all();
        return response()->json($address->new($data));
    }

    public function getMyAddress()
    {
    	$data = DB::table('customer_address')
            ->where('cacustomerid', \Auth::user()->id)
            ->get();
        return response()->json($data);
    }

    public function removeAddress($id)
    {
		if(DB::table('customer_address')->where('caid', $id)->delete())
		{
			$status = 'success';
			$message = 'Delivery Address removed.';
		}
		else
		{
			$status = 'error';
			$message = 'You\'re trying to removed Delivery Address!';
		}

    	return response()->json([ 	
    		'status' => $status,
    		'message' => $message
    	]);
    }

    public function getCartDetails()
    {
    	if(isset(\Auth::user()->id))
    	{
	    	$data = DB::table('order')
	            ->where('ordercustomerid', \Auth::user()->id)
	            ->where('order_status', 'oncart')
	            ->join('menus', 'menus.menuid', '=', 'order.ordermenuid')
	            ->select('order.*', 'menus.mname', 'menus.mprice', 'menus.menuid')
	            ->get();

	    	return response()->json($data);
    	}
    }

    public function getCartCount()
    {
    	if(isset(\Auth::user()->id))
    	{
	    	$data = DB::table('order')
	            ->where('ordercustomerid', \Auth::user()->id)
	            ->where('order_status', 'oncart')
	            ->count();

	    	return response()->json($data);
    	}
    	else
    	{    		
	    	return response()->json(0);
    	}
    }

    public function getCartAddonDetails($id)
    {
    	$data = DB::table('addons')
            ->where('addid', $id)
            ->first();

    	return response()->json($data);
    }

    public function removeCartItem($orderid)
    {
		if(DB::table('order')->where('orderid', $orderid)->delete())
		{
			$status = 'success';
			$message = 'You removed an item from cart!';
		}
		else
		{
			$status = 'error';
			$message = 'You\'re trying to removed an item from cart!';
		}

    	$cart_cnt = DB::table('order')
                ->where('ordercustomerid', \Auth::user()->id)
                ->where('order_status', 'oncart');

    	return response()->json([
    		'cart_cnt' => $cart_cnt->count(),    	
    		'status' => $status,
    		'message' => $message
    	]);
    }
}
