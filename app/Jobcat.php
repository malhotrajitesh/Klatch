<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jobcat extends Model
{
    use SoftDeletes;

    public $table = 'job_cat';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
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
