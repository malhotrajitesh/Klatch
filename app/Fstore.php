<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fstore extends Model
{

  use SoftDeletes;

 public $table = 'fstores';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

 protected $casts = [
         'sdata' => 'array',
    ];

    protected $guarded = ['id'];

  


    //
}
