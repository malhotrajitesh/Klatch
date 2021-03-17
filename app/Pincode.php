<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pincode extends Model
{
    

    public $table = 'pincode_holisol';

    protected $fillable = [
        'pincode',
        'area',
        'region',
        'city',
        'state',

    ];

}
