<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CacheTrait;
use Illuminate\Database\Eloquent\SoftDeletes;


class Dycat extends Model
{

  use SoftDeletes, CacheTrait;

 public $table = 'dydata';



    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $guarded = ['id'];

  


    //
}
