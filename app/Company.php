<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{

use SoftDeletes;

    public $table = 'companys';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
    	
        'cmname',
        'logo',
        'cpname',
        'gst',
        'pan_nmbr',
        'address',
         'pincode',
          'inco_cert',
        'state',
        'country',
        'contact_no',
        'alt_no',
         'email',
         'created_by_id',
        
        
        
    ];

   


   public function cbranchs()
    {
        return $this->belongsToMany(Cbranch::class);
    }



    //
}
