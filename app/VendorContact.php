<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VendorContact extends Model
{
    protected $table = 'vendor_contact';

    protected $fillable = [
     'vc_vendor_id',
     'vc_number',
     'created_at'
    ];
}
