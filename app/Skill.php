<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Skill extends Model
{
    use SoftDeletes;

    public $table = 'skills';

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

 public function profiles()
    {
        return $this->belongsToMany(Profile::class);
    }
    
}
