<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jprofile extends Model
{

	  use SoftDeletes, MultiTenantModelTrait;

    public $table = 'jprofile';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
 
 protected $guarded = ['id'];

   public function jobs()
    {
        return $this->hasMany(Job::class, 'cmp_id', 'id');
    }
    
       public static function boot() {
        parent::boot();

        static::deleting(function($jprofile) { // before delete() method call this
             $jprofile->jobs()->delete();
             // do the rest of the cleanup...
        });
    }



    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

 public function jobcategry()
    {
        return $this->belongsTo(Jobcat::class, 'job_cat_id');
    }


}
