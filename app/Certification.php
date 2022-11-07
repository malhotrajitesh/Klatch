<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certification extends Model
{

	  use SoftDeletes, MultiTenantModelTrait;

    public $table = 'certifications';

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




      public function getEntryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }


}
