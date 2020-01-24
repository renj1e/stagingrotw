<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

// Models
use \App\Order;

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
        return view('fe/track-order');
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
			$message = 'message';
		}
		else
		{
			$status = 'error';
			$message = 'message';
		}
    	return response()->json([
    		'status' => $status,
    		'message' => $message
    	]);
    }
}
