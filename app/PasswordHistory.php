<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PasswordHistory extends Model
{
    use SoftDeletes, MultiTenantModelTrait;

    public $table = 'password_histories';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
         
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
        'password',
    ];



    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
