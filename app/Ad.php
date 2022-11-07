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

 protected $guarded = ['id'];


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
