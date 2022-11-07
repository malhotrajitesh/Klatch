<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use App\Notifications\ToEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ad extends Model
{

	  use SoftDeletes, Notifiable, MultiTenantModelTrait;

    public $table = 'ad';

    protected $dates = [
        'exp_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
         'ad_cat_id',
        'ad_scat_id',
        'adti',
        'adtd',
        'longitude',
        'latitude',
        'ad_type',
        'ad_city',
        'ad_state',
        'ad_pincode',
        'ad_pic',
        'ad_picb',
        'ad_picc',
        'ad_picd',
        'ad_pice',
        'ad_status',
        'created_by_id',
        'approved_by_id',
        'qty',
        'step',
        'ad_price',
        'exp_date',
        'asaved',
        'aview',
        'ip',

       
        
    ];


   public function ad_cats()
    {
        return $this->belongsTo(Adcat::class, 'ad_cat_id');
    }
  


       public function ad_scats()
    {
        return $this->belongsTo(Adscat::class, 'ad_scat_id');
    }

  public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    //
}
