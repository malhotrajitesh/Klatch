<?php

namespace App;


use App\Notifications\ToEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;

class Applyjob extends Model
{

	  use SoftDeletes, Filterable, Notifiable;

    public $table = 'jobs';

    private static $whiteListFilter = ['*'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
 

    protected $fillable = [
         'job_t',
        'job_dsc',
        'jdate',
        'jmobile',
        'jemail',
        'longitude',
        'latitude',
        'Job_pincode',
        'Job_pic',
        'created_by_id',
        'asaved',
        'aview',
        'j_cat_id',
        'cmp_id',
        'cmp_name',
        'jdegree',
        'jentity', 
        'jstep',
        'jstatus',
        'jminsal',
        'jmaxsal',
        'jminexp',
        'jmaxexp',
        'jtype',
        'jseeker',
        'jview',
        'jbook' 
        
    ];


   public function job_cats()
    {
        return $this->belongsTo(Jobcat::class, 'j_cat_id');
    }
  

 public function jprofiles()
    {
        return $this->belongsTo(Jprofile::class, 'cmp_id')->withoutGlobalScope('created_by_id')->with('jobcategry');
    }

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

       public function aplys() 
    {
       
         return $this->japlys()->where('user_id',  auth()->id());
    }

         public function savs() 
    {
       
        return $this->jsavs()->where('user_id',  auth()->id());
    }

    public function japlys() 
    {
        return $this->hasMany(Apply::class, 'job_id');
    }

         public function jsavs() 
    {
        return $this->hasMany(Savejob::class, 'job_id');
    }




     public function applys()
    {
      //  return $this->belongsTo(Apply::class, 'id');
       // return $this->belongsToMany(Apply::class)->withTimeStamps();
        $user_id1 = Auth()->user()->id;

        $applys = Apply::where('user_id', '=', $user_id1)->where('job_id', '=', $this->id)->count();


        return  $applys;

    }

      public function savejobs()
    {
      //  return $this->belongsTo(Apply::class, 'id');
       // return $this->belongsToMany(Apply::class)->withTimeStamps();
        $user_id1 = Auth()->user()->id;

        $savejobs = Savejob::where('user_id', '=', $user_id1)->where('job_id', '=', $this->id)->count();


        return  $savejobs;

    }

 


 
  
    public function cbranchs()
    {
        return $this->belongsToMany(Cbranch::class, 'cbranch_job','job_id','cbranch_id');
    }


      public function degrees()
    {
        return $this->belongsToMany(Degree::class, 'degree_job','job_id','degree_id');
    }

   public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_job','job_id','skill_id');
    }

}
