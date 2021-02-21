<?php

namespace App;

//use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Savejob extends Model
{
    //MultiTenantModelTrait
    use SoftDeletes;

    public $table = 'save_job';

    protected $primaryKey = 'job_id';

   public $incrementing = false;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'job_id',
        'created_at',
        'updated_at',
        'deleted_at',
       
    ];

 
  

  
}
