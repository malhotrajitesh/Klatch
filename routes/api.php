<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin'], function () {
 Route::post('login', 'RegisterController@login');
    Route::post('register', 'RegisterController@register');
   Route::post('forgot', 'RegisterController@forgot');

 
    
    

});

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
      Route::get('logout', 'RegisterController@logout');
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Expensecategories
    Route::apiResource('expense-categories', 'ExpenseCategoryApiController');

    // Incomecategories
    Route::apiResource('income-categories', 'IncomeCategoryApiController');

    // Expenses
    Route::apiResource('expenses', 'ExpenseApiController');

    // Incomes
    Route::apiResource('incomes', 'IncomeApiController');

    // Expensereports
    Route::apiResource('expense-reports', 'ExpenseReportApiController');
      Route::get('ads/soldad/{nad}', 'AdController@soldad');
       Route::post('ads/adact', 'AdController@adact');

   Route::get('ads/fetch/{id?}', 'AdApiController@fetch');
    Route::get('ads/pendapp', 'AdApiController@pendapp');

       Route::get('ads/createStep1', 'AdApiController@createStep1');
Route::post('ads/postCreateStep1', 'AdApiController@postCreateStep1');

     Route::get('ads/createStep2/{ad?}', 'AdApiController@createStep2');
Route::post('ads/postCreateStep2', 'AdApiController@postCreateStep2');
    Route::get('ads/createStep3/{ad}', 'AdApiController@createStep3');
Route::post('ads/postCreateStep3', 'AdApiController@postCreateStep3');


Route::get('ads/createStep4/{ad}', 'AdApiController@createStep4');
Route::post('ads/postCreateStep4', 'AdApiController@postCreateStep4');
Route::get('ads/createStep5/{ad}', 'AdApiController@createStep5');
Route::resource('ads', 'AdApiController');

Route::resource('adcats', 'AdcatApiController');
Route::resource('adscats', 'AdscatApiController');
Route::get('buyads/adetail/{bad}', 'BuyAdApiController@adetail')->name('buyads.adetail');
      Route::resource('buyads', 'BuyAdApiController');

Route::post('adsaveds/adsave/', 'AdsavedApiController@adsave');
  Route::resource('adsaveds', 'AdsavedApiController');

// for job
  Route::get('jobs/skills', 'JobApiController@skills');
      Route::get('jobs/degrees', 'JobApiController@degrees');
     Route::get('jobs/branchs', 'JobApiController@branchs');
      Route::get('jobs/entitys', 'JobApiController@entitys');
    Route::get('jobs/fetchname/', 'JobApiController@fetchname');
    Route::get('jobs/pendjob/{njob}', 'JobApiController@pendjob');
       Route::get('jobs/createStep1', 'JobApiController@createStep1');
Route::post('jobs/postCreateStep1', 'JobApiController@postCreateStep1');
     Route::get('jobs/createStep2/{job?}', 'JobApiController@createStep2');
Route::post('jobs/postCreateStep2', 'JobApiController@postCreateStep2');
    Route::get('jobs/createStep3/{job?}', 'JobApiController@createStep3');
    Route::resource('jobs', 'JobApiController');
Route::resource('skills', 'SkillApiController');
 Route::get('applyjobs/getappliedjob/', 'ApplyjobApiController@getappliedjob')->name('applyjobs.getappliedjob');
    Route::get('applyjobs/getsavejob/', 'ApplyjobApiController@getsavejob')->name('applyjobs.getsavejob');
    Route::get('applyjobs/applicantd/{job?}', 'ApplyjobApiController@applicantd');
    Route::post('applyjobs/jobsave/', 'ApplyjobApiController@jobsave')->name('applyjobs.jobsave');
    Route::post('applyjobs/joapply', 'ApplyjobApiController@joapply')->name('applyjobs.joapply');
    Route::post('applyjobs/japply', 'ApplyjobApiController@japply')->name('applyjobs.japply');
    Route::resource('applyjobs', 'ApplyjobApiController');
    Route::resource('experiances', 'ExperianceApiController');
    Route::post('educations/fetchdegree', 'EducationApiController@fetchdegree')->name('educations.fetchdegree');
     Route::resource('educations', 'EducationApiController');
    Route::get('profiles/profilev/{pid?}/{uid?}/{jid?}', 'ProfileApiController@profilev')->name('profiles.profilev');
    Route::post('profiles/pskill', 'ProfileApiController@pskill')->name('profiles.pskill');
     Route::post('profiles/uploadpic', 'ProfileApiController@uploadpic')->name('profiles.uploadpic');
     Route::delete('profiles/destroy', 'ProfileApiController@massDestroy')->name('profiles.massDestroy');
    Route::resource('profiles', 'ProfileApiController');

        // event Api  

     Route::get('events/fetchcity/{search?}', 'IventApiController@fetchcity');
    Route::put('events/evup/{ivent}', 'IventApiController@evup')->name('events.evup');
  //  Route::get('events/verifymaster/{ivent}', 'IventApiController@verifymaster')->name('events.verifymaster');
     Route::get('events/closeevent/{nivent}', 'IventApiController@closeevent')->name('events.closeevent');
    //  Route::get('events/eventmaster/', 'IventApiController@eventmaster')->name('events.eventmaster');
      Route::get('events/pendevent/{nivent}', 'IventApiController@pendevent')->name('events.pendevent');
       Route::get('events/create-step1', 'IventApiController@createStep1')->name('events.create-step1');
Route::post('events/postcreate-step1', 'IventApiController@postCreateStep1')->name('events.postcreate-step1');

     Route::get('events/create-step2/{ivent?}', 'IventApiController@createStep2')->name('events.create-step2');
Route::post('events/postCreateStep2', 'IventApiController@postCreateStep2')->name('events.postCreateStep2');
Route::get('events/create-step3/{ivent?}', 'IventApiController@createStep3')->name('events.create-step3');
 
    Route::delete('events/destroy', 'IventApiController@massDestroy')->name('events.massDestroy');
    Route::resource('events', 'IventApiController');
     Route::get('applyevents/appliedevent/', 'ApplyeventApiController@appliedevent')->name('applyevents.appliedevent');
     Route::get('applyevents/getsaveevent/', 'ApplyeventApiController@getsaveevent')->name('applyevents.getsaveevent');
      Route::get('applyevents/viewlist/{ivent?}', 'ApplyeventApiController@viewlist')->name('applyevents.viewlist');
Route::post('applyevents/eintested/', 'ApplyeventApiController@eintested')->name('applyevents.eintested');
Route::post('applyevents/evbook/', 'ApplyeventApiController@evbook')->name('applyevents.evbook');
     Route::resource('applyevents', 'ApplyeventApiController');


});