<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\MultiTenantModelTrait;

class Feedback extends Model
{

 use MultiTenantModelTrait;

 public $table = 'feedbacks';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    protected $guarded = ['id'];

  
  public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
