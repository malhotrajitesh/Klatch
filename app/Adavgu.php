<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adavgu extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'ad_avgu';

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
