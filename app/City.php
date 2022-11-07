<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use eloquentFilter\QueryFilter\ModelFilters\Filterable;

class City extends Model
{

  use SoftDeletes, Filterable, CacheTrait;

 public $table = 'citys';

 private static $whiteListFilter = ['*'];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = ['id'];

  


    //
}
