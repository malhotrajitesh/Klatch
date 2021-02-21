<?php

namespace App;

//use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Userevent extends Model
{
    //MultiTenantModelTrait
    use SoftDeletes;

    public $table = 'user_ivent';

    protected $primaryKey = 'ivent_id';

   public $incrementing = false;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'ivent_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
       
    ];

 
  

  
}
