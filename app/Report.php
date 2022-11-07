<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;

class Report extends Model
{

  use SoftDeletes, Filterable, CacheTrait, MultiTenantModelTrait;

 public $table = 'reports';

 private static $whiteListFilter = ['*'];

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

 public function ad_by()
    {


    	if($this->rptype == 'ad'){
    		 $this->belongsTo(Ad::class, 'rp_id');
    	}
    	elseif($this->rptype == 'job'){
    		return $this->belongsTo(Job::class, 'rp_id');
    	}
    		elseif($this->rptype == 'event'){
    		 $this->belongsTo(Ivent::class, 'rp_id');
    	}
    	elseif($this->rptype == 'social'){
    		return $this->belongsTo(Follow::class, 'rp_id');
    	
    	}
        
    }

   
    //
}
