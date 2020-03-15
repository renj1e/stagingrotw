<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendors extends Model
{
    protected $table = 'vendors';

    protected $fillable = [
     'vname',
     'vstreet',
     'vprovince',
     'vcity',
     'vprovince',
     'vcountry',
     'vis_activated'
    ];
    
}
