<?php

namespace App;


use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cbranch extends Model
{
    use SoftDeletes;

    public $table = 'cbranchs';

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


    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }

    public function companys()
    {
        return $this->belongsToMany(Company::class);
    }


/*

  public function jobs(){
 return $this->hasMany(job::class,'id', 'jbranch');
       }



public function jobs(){
    return $this->belongsTo(Job::class, 'jbranch');
    }
    */



/*
    public function jobs()
{
 return $this->belongsToMany(Job::class, Cbranch::class, 'jbranch', 'id');
}

*/

}
