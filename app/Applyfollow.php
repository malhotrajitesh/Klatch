<?php

namespace App;


use App\Notifications\ToEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applyfollow extends Model
{

	  use \Conner\Tagging\Taggable, SoftDeletes;

    public $table = 'follows';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
 

    protected $fillable = [
         'so_title',
         'so_desc',
        'tags',
        'so_imga',
        'so_imgb',
        'so_imgc',
        'so_imgd',
        'so_imge',  
        'created_by_id',
        'approved_by_id',
        'so_status',
        'so_step',
        'so_like',
        'ip'
        ];
    
    
   




      public function getEntryDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setEntryDateAttribute($value)
    {
        $this->attributes['entry_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }





  public function user_by()
    {
        return $this->belongsTo(Profile::class, 'created_by_id', 'created_by_id');
    }
  
    
}
