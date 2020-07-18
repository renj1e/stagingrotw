<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';

    public function new($data)
    {    	
    	$contact = new Contact;
		$contact->concustomerid = $data['concustomerid'];
		$contact->conlabel = $data['conlabel'];
		$contact->connumber = $data['connumber'];		

        return $contact;
		if($contact->save())
		{
			$status = 'success';
			$message = $data['conlabel'] . ' has been added to contact list!';
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
