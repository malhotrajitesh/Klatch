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
 
 protected $guarded = ['id'];

  


    
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }



}
