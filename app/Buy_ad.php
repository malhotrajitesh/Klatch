<?php

namespace App;

use App\Notifications\ToEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;

class Buy_ad extends Model
{

	  use SoftDeletes, Filterable, Notifiable;

    public $table = 'ad';

    private static $whiteListFilter = ['*'];

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

  
        public function adsavc() 
    {
        return $this->likes()->where('created_by_id',  auth()->id());
    }

     public function likes()
     {
     return $this->hasMany(Adsaved::class, 'ad_id');
   }


  public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

     public function profiles()
    {
        return $this->belongsTo(Profile::class, 'created_by_id', 'created_by_id');
    }

           public function savead()
    {

        $user_id1 = Auth()->user()->id;

        $savead = Adsaved::where('created_by_id', '=', $user_id1)->where('ad_id', '=', $this->id)->count();


        return  $savead;

    }
     public function reported()
     {
     return $this->hasMany(Report::class, 'rp_id')->where('rptype', '=', 'ad');
   }

    //
}
