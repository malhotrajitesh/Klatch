<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use App\Notifications\ToEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ivent extends Model
{

	  use SoftDeletes, Notifiable, MultiTenantModelTrait;

    public $table = 'ivents';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
 

    protected $fillable = [
         'ev_mode',
         'ev_title',
        'ev_dura',
        'ev_start',
        'ev_end',
        'ev_time',
        'ev_endtime',
        'ev_venue',
        'ev_city',
        'ev_link',
        'ev_pic',
        'ev_by',    
        'created_by_id',
        'approved_by_id',
        'ev_step',
        'ev_view',
        'ev_status',
        'ev_exp_date',
        'ip',
        'ev_save',
        'ev_interest',
        'ev_about'
        
    ];
   




      public function getEntryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }


  public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

  


 
  
  
/*
      public function degrees()
    {
        return $this->belongsToMany(Degree::class);
    }

   public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_job','job_id','skill_id');
    }

*/
    
}
