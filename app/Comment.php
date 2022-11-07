<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    
public static function boot() {
        parent::boot();

        static::deleting(function($comment) { // before delete() method call this
             $comment->replies()->delete();
             // do the rest of the cleanup...
        });
    }



    public $table = 'comments';

    protected $dates = [
        'created_at',
        'updated_at',
        
    ];






 

    public function user()
    {
        return $this->belongsTo(User::class);
    }

  public function udetail()
    {
        return $this->belongsTo(Profile::class, 'user_id', 'created_by_id');
    }


   public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id')->with('udetail:created_by_id,name,propic');
    }


}
