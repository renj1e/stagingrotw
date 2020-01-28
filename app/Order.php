<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'order';

    public function new($data)
    {
    	if(isset($data['orderaddons']))
    	{
	    	$_raw_addons =  json_decode(json_encode($data['orderaddons']),true);
			foreach (array_keys($_raw_addons, 0) as $key) {
				unset($_raw_addons[$key]);
			}

    	}
    	$_is_exist = DB::table('order')
                ->where('ordercustomerid', $data['ordercustomerid'])
                ->where('ordermenuid', $data['ordermenuid'])
                ->where('order_status', 'oncart');

        if($_is_exist->count() > 0)
        {
            $order = DB::table('order')
                ->where('orderid', $_is_exist->first()->orderid)
                ->update([
                	'orderquantity' => $data['orderquantity'],
                	'orderaddons' => (isset($data['orderaddons']))? json_encode($_raw_addons) : '{}'
                ]);

			$menu_details = DB::table('menus')
	            ->where('menuid', $data['ordermenuid'])
	            ->select('menus.mname')
	            ->first();

            $new_cart_item = $menu_details;
			$status = 'success';
			$message = ' on cart has been updated!';
        }
        else
        {
	    	$order = new Order;
			$order->ordercustomerid = $data['ordercustomerid'];
			$order->ordermenuid = $data['ordermenuid'];
			$order->orderaddons = (isset($data['orderaddons']))? json_encode($_raw_addons) : '{}';
			$order->orderquantity = $data['orderquantity'];
			$order->order_status = 'oncart';			

			$menu_details = DB::table('menus')
	            ->where('menuid', $data['ordermenuid'])
	            ->select('menus.mname')
	            ->first();

			if($order->save())
			{
            	$new_cart_item = $menu_details;
				$status = 'success';
				$message = ' has been added to cart!';
			}
			else
			{
            	$new_cart_item = $menu_details;
				$status = 'error';
				$message = ' is not added to cart!';
			}
        }

    	$cart_cnt = DB::table('order')
                ->where('ordercustomerid', \Auth::user()->id)
                ->where('order_status', 'oncart');

    	return [
    		'new_cart_item' => $new_cart_item,
    		'cart_cnt' => $cart_cnt->count(),
    		'status' => $status,
    		'message' => $message
    	];
    }
}
