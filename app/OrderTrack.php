<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderTrack extends Model
{
    protected $table = 'order_track';

    public function new($data)
    {    	
    	$_is_exist = DB::table('order_track')
                ->where('order_trackcustomerid', \Auth::user()->id)
                ->where('order_trackstatus', 'order_confirmed_and_received')
                ->count();

    	if($_is_exist < 1)
    	{
	    	$order = new OrderTrack;
			$order->order_trackcustomerid = \Auth::user()->id;
			$order->order_trackorderid = json_encode(explode(',', $data['ids']));
			$order->order_trackdelivery_addressid = $data['address'];
			$order->order_trackstatus = 'order_confirmed_and_received';
			$order->order_trackdelivery_fee = $data['fee'];
			$order->order_trackremarks = '';
			$order->order_tracksched_date = '';

			if($order->save())
			{
				$_orders = explode(',', $data['ids']);
				foreach ($_orders as $value) {
		            $order = DB::table('order')
		                ->where('orderid', $value)
		                ->update([
		                	'order_status' => 'processing'
		                ]);
				}
				
				$status = 'success';
				$message = 'Order has been confirmed!';
			}
			else
			{
				$status = 'error';
				$message = 'Ooopps! Something went wrong!';
			}
    	}
    	else
    	{
			$status = 'success';
			$message = 'Order has been already confirmed!';
    	}
    	return [
    		'status' => $status,
    		'message' => $message
    	];
    }
}
