<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Adscat extends Model
{
    use SoftDeletes;

    public $table = 'ad_subcat';

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
        'ad_cat_id',
    ];

    public function ad_cats()
    {
        return $this->belongsTo(Adcat::class, 'ad_cat_id');
    }

 
    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
