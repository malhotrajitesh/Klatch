<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adsaved extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'ad_saved';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'ad_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];




    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
