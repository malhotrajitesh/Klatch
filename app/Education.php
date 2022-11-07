<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use App\Notifications\ToEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Education extends Model
{

	  use SoftDeletes, Notifiable, MultiTenantModelTrait;

    public $table = 'educations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
 

    protected $fillable = [
         'degree_name',
        'total_no',
        'get_no',
        'current',
        'e_from',
        'e_to',
        'college',
        'fos',
        'uplace',
        'ugrade',
        'udesc',
        'created_by_id',
        'xtra'  
    ];


    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }


/*
   public function job_cats()
    {
        return $this->belongsTo(Jobcat::class, 'j_cat_id');
    }
  

 public function company()
    {
        return $this->belongsTo(Company::class, 'cmp_id');
    }

      public function getEntryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }


  
  


 
  
    public function cbranchs()
    {
        return $this->belongsToMany(Cbranch::class);
    }


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
