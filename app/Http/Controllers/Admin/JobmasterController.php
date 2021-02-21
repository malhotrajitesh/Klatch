<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use App\Http\Controllers\Controller;

use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facjobes\Auth;

class JobmasterController extends Controller
{
    public function index()
    {
      
       abort_if(Gate::denies('verify_access') , Response::HTTP_FORBIDDEN, '403 Forbidden');
      $jobs = Job::latest()->with('job_cats:id,name', 'company:id,cmname,logo', 'cbranchs:id,name','created_by:id,name')->get();
  

        return view('admin.jobmasters.index', compact(
            'jobs'
        ));
    }

   public function edit(Job $job)
    {
  print_r($job);
  die("jol");
    	 $job->load('job_cats', 'company', 'cbranchs', 'skills', 'degrees','created_by');
      return view('admin.jobmasters.edit', compact('job'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\job  $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job)
    {


$start_day = Carbon::now()->format('Y-m-d 00:00:00'); //get a carbon instance with created_at as date
$expiry_day = $start_day->jobdDays($request['exp_date']); 

$job->update(['job_status' => $request['job_status'], 'exp_date' => $expiry_day]);
     return redirect()->route('admin.jobmasters.index')->withSuccess('job Verified Successfully ');


        //
    }


}
