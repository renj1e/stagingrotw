<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $table = 'customer_address';

    public function new($data)
    {    	
    	$order = new CustomerAddress;
		$order->cacustomerid = $data['cacustomerid'];
		$order->calabel = $data['calabel'];
		$order->castreet = $data['castreet'];		
		$order->cacity = $data['cacity'];			
		$order->caprovince = $data['caprovince'];	
		$order->cacountry = $data['cacountry'];		

		if($order->save())
		{
			$status = 'success';
			$message = $data['calabel'] . ' has been added to delivery address!';
		}
		else
		{
			$status = 'error';
			$message = 'Ooopps! Something went wrong!';
		}
    	return [
    		'status' => $status,
    		'message' => $message
    	];
    }
}
