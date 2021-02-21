<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use App\Notifications\ToEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Experiance extends Model
{

	  use SoftDeletes, Notifiable, MultiTenantModelTrait;

    public $table = 'experiances';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
 

    protected $fillable = [
        'created_by_id',
         'exp_type',
        'etitle',
        'emp_type',
        'cmp_name',
        'cmp_loc',
        'c_job',
        'estart',
        'exend'
       
    ];


    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }


/*

  
  


 
  
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
