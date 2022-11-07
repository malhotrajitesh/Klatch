<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Artisan;
//use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Cache;


trait CacheTrait
{

    /**
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        /**
         * After model is created, or whatever action, clear cache.
         */
        static::updated(function () {
            Artisan::call('cache:clear');
        });

             static::created(function() {
            Artisan::call('cache:clear');
        });

        static::deleted(function () {
           Artisan::call('cache:clear');
        });

      
 }

/*
     public function cacheThisModel(String $model)
   {
      if (!Cache::has('cache'.$model))
      {
         $model_name = "\App\\$model";
         Cache::rememberForever(('cache'.$model), function () use ($model_name)
         {
            return $model_name::all();
         });
      }

      return Cache::get('cache'.$model);
   }

 
public function updateCacheModel(String $model)
   {
      Cache::forget('cache'.$model);

      $model_name = "App\\$model";
      $data = $model_name::all();

      Cache::forever(('cache'.$model), $data);
   }
   
  */
}



