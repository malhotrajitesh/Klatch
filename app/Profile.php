<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use App\Notifications\ToEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{

	  use SoftDeletes, Notifiable;

    public $table = 'profiles';

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

 public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skill_profile','profile_id','skill_id');
    }


}
