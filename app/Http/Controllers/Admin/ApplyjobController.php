<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\MassDestroyApplyjobRequest;

	use App\Applyjob;
	use App\Savejob;
	use App\Profile;
	use App\Apply;
	use App\Company;
	use App\Traits\WebmeTrait;
	use App\Applyjobcat;
	use App\Skill;
	use App\Degree;
	use Gate;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use Symfony\Component\HttpFoundation\Response;


	class ApplyjobController extends Controller
	{
        use  WebmeTrait;

		public function index()
		{
			abort_if(Gate::denies('naukri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

			$applyjobs = Applyjob::where('jstatus','=','Approve')->get();

			return view('admin.applyjobs.index', compact('applyjobs'));
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
            
                        $uid=$user_id;
              $fdata = $jinc['job_t'];
              $a_admin=0;
              $mf='apply';
              $mc='Job';
       $this->notidata($uid,$fdata,$a_admin,$mf,$mc);
      
       $uid=$jinc['created_by_id'];
              $fdata = $jinc['job_t'];
              $a_admin=0;
              $mf='applied';
              $mc='Job';
       $this->notidata($uid,$fdata,$a_admin,$mf,$mc);

                $response = "applied";
                echo json_encode($response);
      exit;

          }
          else{

          	$profile = Profile::where('created_by_id',$user_id)->where('prog',100)->first();

          	if($profile)
          	  {
                
               $response = "first";  
      echo json_encode($response);
      exit;


          	  }
          	  else
          	  {
               return redirect()->route('admin.profiles.index')->with('success','First Complete Your Profile then Apply For Job');


          	  }
         



          }
	    	

	    	
	 //   $ad = $Applyjob;

	//     $ad->notify(new \App\Notifications\ToEmail( $ad ) );
	  //   Mail::to($Applyjob)->send($Applyjob);

	    	return redirect()->route('admin.applyjobs.index');
	    }

 public function joapply(Request $request)
	    {
	    	$user_id = Auth()->user()->id;
	    	   $apsuc = Apply::create(['user_id' => $user_id,'job_id' => $request['jid']]);
	    	   $jinc = Applyjob::where('id',$request['jid'])->first();

           $jinc->increment('jseeker');
           $jinc->increment('jview');
                $response = "applied";
                echo json_encode($response);
      exit;


	    }

 public function applicantd($job)
	    {


  $profiles=Apply::leftjoin('profiles', 'user_job.user_id', '=', 'profiles.created_by_id')
                ->where('user_job.job_id', $job)->get();


      return view('admin.applyjobs.viewapply', compact('profiles'));


	    }




 public function jobsave(Request $request){

    $userId = Auth()->user()->id;



    $a_like = Savejob::withTrashed()->where('user_id',$userId)->where('job_id', '=', $request->job)->first();

    if (is_null($a_like)) {
        $savejob = Savejob::create(['user_id' => $userId,'job_id' => $request->job]);
        Applyjob::where('id', '=', $request->job)->increment('jbook');
        $output = '1';
        echo $output;
    } else {
        if (is_null($a_like->deleted_at)) {
            $a_like->delete();
            Applyjob::where('id', '=', $request->job)->decrement('jbook');
            $output = '2';
            echo $output;
        } else {
            $a_like->restore();
           Applyjob::where('id', '=', $request->job)->increment('jbook');
            $output = '1';
            echo $output;
        }
    }

}


	    public function store(Request $request)
	    {

	    //	$ip = request()->ip();

	    	$ads = Apply::where('user_id',$request['uid'])->where('job_id',$request['jid'])->update(['status' => $request['jstatus']]);

	    
	

	    	return back();
	    }


  public function getsavejob(Request $request)
    {
       // abort_if(Gate::denies('ubio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
          $user_id = Auth()->user()->id;

                    $savj=Savejob::where('user_id',$user_id)->select('job_id')->get();


          $applyjobs=Applyjob::whereIn('id', $savj)->get();
    //	$jobs = DB::table('jobs')
     //   ->rightJoin('save_job', 'jobs.id', '=', 'save_job.job_id')
     //   ->where('save_job.user_id', $user_id)
      //   ->select('jobs.*')->get(); 

   
    
return view('admin.applyjobs.savedjob', compact('applyjobs'));
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

   
    
return view('admin.applyjobs.appliedjob', compact('applyjobs'));
    }

	    public function edit(Applyjob $applyjob)
	    {
	    	abort_if(Gate::denies('naukri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    	

	    	return view('admin.Applyjobs.edit', compact('applyjob_categories', 'applyjob'));
	    }

	    public function update(UpdateApplyjobRequest $request, Applyjob $applyjob)
	    {
	    	$Applyjob->update($request->all());

	    	return redirect()->route('admin.Applyjobs.index');
	    
}
	    public function show(Applyjob $applyjob)
	    {
	    	//abort_if(Gate::denies('naukri_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
	    	$job=$applyjob;
	    	
	    
                 $job->increment('jview');
                // dd($applyjob->increment('jview'));
               //  die("jio");

	    	$applyjob->load('jprofiles', 'skills', 'degrees');

	    	return view('admin.applyjobs.show', compact('applyjob'));
	    }

	    public function destroy(Applyjob $applyjob)
	    {
	    	abort_if(Gate::denies('naukri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    	//$Applyjob->delete();

	    	return back();
	    }

	 
	}
