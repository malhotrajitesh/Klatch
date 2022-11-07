<?php

namespace App;

//use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hidefollow extends Model
{
    //MultiTenantModelTrait
    use SoftDeletes;

    public $table = 'hide_follow';

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
        'created_at',
        'updated_at',
        'deleted_at',
       
    ];

 
  

  
}
