<?php

namespace App;

//use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Userfollow extends Model
{
    //MultiTenantModelTrait
    use SoftDeletes;

    public $table = 'user_follow';

    protected $primaryKey = 'follow_id';

   public $incrementing = false;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'follow_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
       
    ];

 
  

  
}
