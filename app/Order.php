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
            DB::table('order')
                ->where('orderid', $_is_exist->first()->orderid)
                ->update([
                	'orderquantity' => $data['orderquantity'],
                	'orderaddons' => (isset($data['orderaddons']))? json_encode($_raw_addons) : '{}'
                ]);

			$status = 'success';
			$message = 'message';
        }
        else
        {
	    	$order = new Order;
			$order->ordercustomerid = $data['ordercustomerid'];
			$order->ordermenuid = $data['ordermenuid'];
			$order->orderaddons = (isset($data['orderaddons']))? json_encode($_raw_addons) : '{}';
			$order->orderquantity = $data['orderquantity'];
			$order->order_status = 'oncart';
			
			if($order->save())
			{
				$status = 'success';
				$message = 'message';
			}
			else
			{
				$status = 'error';
				$message = 'message';
			}
        }

    	return [
    		'status' => $status,
    		'message' => $message
    	];
    }
}
