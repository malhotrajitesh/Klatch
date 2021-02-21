<?php

	namespace App\Http\Controllers\Api\V1\Admin;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\MassDestroyApplyjobRequest;
	use App\Http\Resources\Admin\IncomeResource;

	use App\Applyjob;
	use App\Savejob;
	use App\Profile;
	use App\Apply;
	use App\Company;
	use App\Cbranch;
	use App\Applyjobcat;
	use App\Skill;
	use App\Degree;
	use Gate;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use Symfony\Component\HttpFoundation\Response;


	class ApplyjobApiController extends Controller
	{
		public function index()
		{
			abort_if(Gate::denies('naukri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

			//$applyjobs = Applyjob::all();
		//	 return new IncomeResource(Applyjob::select('id', 'job_t', 'job_dsc')->with(['job_cats', 'company', 'cbranchs', 'skills', 'degrees'])->get());

			return new IncomeResource(Applyjob::with('job_cats:id,name','company:id,cmname,logo','cbranchs:id,name','skills:id,name','degrees:id,name')->get());  
    
	
			

			
		}

		


		public function create()
		{
			abort_if(Gate::denies('naukri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
	/*
	      
	  */
	}

	 public function japply(Request $request)
	    {

           $user_id = Auth()->user()->id;
          $apply = Apply::where('user_id',$user_id)->first();
          if($apply)
          {
           $apsuc = Apply::create(['user_id' => $user_id,'job_id' => $request['jid']]);
           $jinc = Applyjob::where('id',$request['jid'])->first();

           $jinc->increment('jseeker');
           $jinc->increment('jview');
                $response = "applied successfully";
               
                 return  response(['jobaplly'=>$response])
             ->setStatusCode(Response::HTTP_ACCEPTED);
      

          }
          else{

          	$profile = Profile::where('created_by_id',$user_id)->where('prog',100)->first();

          	if($profile)
          	  {
                $response = "first";
                    return  response(['jobaplly'=>$response])
             ->setStatusCode(Response::HTTP_ACCEPTED);
     


          	  }
          	  else
          	  {
          	  	
                  return  response(['success'=>'redirect user to profile Section with msg', 'msg'=>$response])
             ->setStatusCode(Response::HTTP_ACCEPTED);

          	  }
         

          }
	    	

	    	  return  response(['success'=>'redirect user to job apply section'])
             ->setStatusCode(Response::HTTP_ACCEPTED);
	 
	    }

 public function joapply(Request $request)
	    {
	    	$user_id = Auth()->user()->id;
	    	   $apsuc = Apply::create(['user_id' => $user_id,'job_id' => $request['jid']]);
	    	   $jinc = Applyjob::where('id',$request['jid'])->first();

           $jinc->increment('jseeker');
           $jinc->increment('jview');
    $response = "applied successfully";
               
                 return  response(['jobaplly'=>$response])
             ->setStatusCode(Response::HTTP_ACCEPTED);


	    }

 public function applicantd(request $request)
	    {

$job =$request->job;
  $profiles=Apply::leftjoin('profiles', 'user_job.user_id', '=', 'profiles.created_by_id')
                ->where('user_job.job_id', $job)->get();

      return response(['viewapply'=>$profiles]);


	    }




 public function jobsave(Request $request){

    $userId = Auth()->user()->id;



    $a_like = Savejob::withTrashed()->where('user_id',$userId)->where('job_id', '=', $request->job)->first();

    if (is_null($a_like)) {
        $savejob = Savejob::create(['user_id' => $userId,'job_id' => $request->job]);
        Applyjob::where('id', '=', $request->job)->increment('jbook');
        $output = '1';
        return response(['bookmarked'=>$output]);
        
    } else {
        if (is_null($a_like->deleted_at)) {
            $a_like->delete();
            Applyjob::where('id', '=', $request->job)->decrement('jbook');
            $output = '2';
            return response(['No bookmarked'=>$output]);
            
        } else {
            $a_like->restore();
           Applyjob::where('id', '=', $request->job)->increment('jbook');
            $output = '1';
            return response(['Again bookmarked'=>$output]);
           
        }
    }

}


	    public function store(Request $request)
	    {

	    //	$ip = request()->ip();

	    	$ads = Apply::where('user_id',$request['uid'])->where('job_id',$request['jid'])->update(['status' => $request['jstatus']]);

	    
	

	    	return response(['applicant status'=>$ads]);
	    }


  public function getsavejob(Request $request)
    {
     
          $user_id = Auth()->user()->id;

                    $savj=Savejob::where('user_id',$user_id)->select('job_id')->get();


          $applyjobs=Applyjob::whereIn('id', $savj)->get();
    //	$jobs = DB::table('jobs')
     //   ->rightJoin('save_job', 'jobs.id', '=', 'save_job.job_id')
     //   ->where('save_job.user_id', $user_id)
      //   ->select('jobs.*')->get(); 

   return response(['user save jobs'=>$applyjobs]);
    

    }

     public function getappliedjob(Request $request)
    {
       // abort_if(Gate::denies('ubio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
          $user_id = Auth()->user()->id;

                    $savj=Apply::where('user_id',$user_id)->select('job_id')->get();


          $applyjobs=Applyjob::whereIn('id', $savj)->get();
    //	$jobs = DB::table('jobs')
     //   ->rightJoin('save_job', 'jobs.id', '=', 'save_job.job_id')
     //   ->where('save_job.user_id', $user_id)
      //   ->select('jobs.*')->get(); 
return response(['user applied jobs'=>$applyjobs]);
   
    }

	    public function edit(Applyjob $applyjob)
	    {
	    	abort_if(Gate::denies('naukri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    	

	    	return view('admin.Applyjobs.edit', compact('applyjob_categories', 'applyjob'));
	    }

	    public function update(UpdateApplyjobRequest $request, Applyjob $applyjob)
	    {
	    	$Applyjob->update($request->all());

	    	return response(['apply job'=>'updated success']);
	    
}
	    public function show(Applyjob $applyjob)
	    {
	    	//abort_if(Gate::denies('naukri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
	    	$job=$applyjob;
	    	
	    
                 $job->increment('jview');
                // dd($applyjob->increment('jview'));
               //  die("jio");

	    	$applyjob->load('job_cats', 'company', 'cbranchs', 'skills', 'degrees');

	    	return response(['job details'=>$applyjob]);
	    }

	    public function destroy(Applyjob $applyjob)
	    {
	    	abort_if(Gate::denies('naukri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    	//$Applyjob->delete();

	    	return back();
	    }

	 
	}
