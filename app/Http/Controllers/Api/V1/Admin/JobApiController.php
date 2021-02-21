<?php

	namespace App\Http\Controllers\Api\V1\Admin;

	use App\Http\Controllers\Controller;
	use App\Http\Requests\MassDestroyJobRequest;
	 use App\Http\Resources\Admin\JobResource;

	use App\Job;
	use App\User;
	use App\Company;
	use App\Cbranch;
	use App\Jobcat;
	use App\Adentity;
	use App\Skill;
	use App\Degree;
	use App\Profile;
	use Gate;
	use Illuminate\Http\Request;
	 use Illuminate\Support\Facades\DB;
	  use Illuminate\Support\Facades\Auth;
	use Symfony\Component\HttpFoundation\Response;


	class JobApiController extends Controller
	{
		public function index()
		{
			abort_if(Gate::denies('ujob_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

			$jobs = Job::with('job_cats:id,name','company:id,cmname,logo','cbranchs:id,name','skills:id,name','degrees:id,name')->get();  

			//   $jobs=Job::join('companys', 'jobs.cmp_id', '=', 'companys.id')
			  // ->leftJoin('cbranch_job', 'cbranch_job.job_id', '=', 'jobs.id')
    //->leftJoin('cbranchs', 'cbranch_job.cbranch_id', '=', 'cbranchs.id')
//->select('jobs.id','jobs.updated_at','jobs.job_t','jobs.jmaxexp','companys.cmname')
//->groupby('jobs.id')
  //->get();

//$jobs = $jobs->map(function ($job) {
    // $job->cbranchs->pluck('name')->first();
    //return $job;
//});
/*
  $job = $job->map(function ($job) {
     $job->cbranchs->pluck('name');
    return $job;
}); 
*/
			
return response(['job'=>$jobs]);
		//	return new JobResource($job);

			// return new JobResource(Job::with(['created_by','job_cats','company','cbranchs','skills','degrees'])->get());

			
		}

		function fetchname(Request $request)
		{
	// code for prouct name
		


				$employees = Company::orderby('cmname','asc')->select('id','cmname','email','logo','cpname','contact_no','pan_nmbr','inco_cert')->with('cbranchs')->get();

				$response = array();
				foreach($employees as $employee){
				


					$response[] = array("value"=>$employee->id,"label"=>$employee->cmname,"email"=>$employee->email,"logo"=>$employee->logo,"cname"=>$employee->cpname,"mno"=>$employee->contact_no,"pan"=>$employee->pan_nmbr,"cert"=>$employee->inco_cert);
				}

				
				return response(['data'=>$response]);
				
			
		}


		public function create()
		{
			abort_if(Gate::denies('ujob_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	}


	public function skills(Request $request)
	{
$skills = Skill::select('id','name')->get();
			

			 return response(['skills'=>$skills]);

	}

		public function degrees(Request $request)
	{
$degrees = Degree::select('id','name')->get();
			

			 return response(['degrees'=>$degrees]);

	}



	public function branchs(Request $request)
	{
$cbranchs = Cbranch::select('id','name')->get();
			

			 return response(['cbranchs'=>$cbranchs]);

	}

		public function entitys(Request $request)
	{
$entitys = Adentity::select('id','name')->get();
			

			 return response(['entitys'=>$entitys]);

	}






	public function pendjob(Request $request)
	{

		$gol= $request->njob;


	    // $userId = Auth::user()->id;
		$job = Job::where('id',$gol)->where('jstatus', '=', 'UNFINISHED')->first();
		if($job)
		{

			if($job->jstep==1)
			{

				$job=$job->id;
				
				 return response(['step' =>2, 'job'=>$job]);

			}
			elseif($job->jstep==2) {

				$job=$job->id;

			   return response(['step' =>3, 'job'=>$job]);
			}

		}
		else{
			return response(['msg' =>'No Pending Ad Found', 'job'=>$job]);
		}

	}


	public function createStep1(Request $request)
	{

		if(isset($request->job)) {
			$asd = $request->get('job');
			$job = Job::where('id',$asd)->first();
			$job->load('Job_cats','company');

			$job_categories = Jobcat::select('id','name')->get();
			$uid=auth()->user()->id;
            $user = Profile::where('created_by_id', $uid)->first();
			$cbranchs = Cbranch::select('id','name')->get();
			 $ad_entitys = Adentity::select('id','name')->get();			

           return response(['job_categories' =>$job_categories, 'job'=>$job , 'user'=>$user , 'entitys'=>$ad_entitys , 'cbranchs'=>$cbranchs]);


			
		}
		else{

			$uid=auth()->user()->id;
            $user = Profile::where('created_by_id', $uid)->first();
			//$cbranchs = Cbranch::select('id','name')->get();
			// $ad_entitys = Adentity::select('id','name')->get();

			$data = Jobcat::select('id','name')->get();
				//$joc = new JobResource($data);

		//	$cbranchs = Cbranch::select('id','name')->get();
			

			 return response(['job_categories'=>$data, 'user'=>$user]);
			
             

		}

	}


	public function postCreateStep1(Request $request)
	{
 $validatedData = $request->validate([

        'jstep' => 'required', 'jstatus' => 'required'

        ]);

$uid=auth()->user()->id;
        if (!isset($request->job))

        {

            if ($request->jentity != '1')
            {

                if (empty($request->cmp_id))
                {

                    $files = $request->file('logo');
                    if (isset($files))
                    {

                        $files2 = $request->file('inco_cert');
                        $destinationPath = 'public/image/clogo';
                        $destinationPath2 = 'public/image/ucert';
                        $fileName = "uvajlogo-" . time() . '.' . $request
                            ->logo
                            ->getClientOriginalExtension();
                        $fileName2 = "uvajert-" . time() . '.' . $request
                            ->inco_cert
                            ->getClientOriginalExtension();
                        $files->move($destinationPath, $fileName);
                        $files2->move($destinationPath2, $fileName2);
                    }
                    else
                    {

                        $fileName = "defaultjl.jpg";
                        $fileName2 = "defaultji.jpg";
                    }

                    $company = Company::create(['cmname' => $request['cmp_name'], 'cpname' => $request['cpname'], 'contact_no' => $request['contact_no'], 'email' => $request['email'], 'created_by_id' => $uid, 'inco_cert' => $fileName2, 'logo' => $fileName

                    ]);

                    $company->cbranchs()
                        ->sync($request->input('cbranchs', []));

                    $ncid = $company->id;

                    $job = Job::create(['j_cat_id' => $request['j_cat_id'], 'jentity' => $request['jentity'],'jname' => $request['jname'],'jmobile' => $request['jmobile'],'jemail' => $request['jemail'],'jstep' => $request['jstep'], 'jstatus' => $request['jstatus'], 'created_by_id' => $uid, 'cmp_id' => $ncid

                    ]);

                    $job->cbranchs()
                        ->sync($request->input('cbranchs', []));
                    $job = $job->id;
                    return response(['id'=>$job]);

                }

                else
                {

                    $job = Job::create(['j_cat_id' => $request['j_cat_id'],'jname' => $request['jname'],'jmobile' => $request['jmobile'],'jemail' => $request['jemail'], 'jadd' => $request['jadd'], 'jentity' => $request['jentity'], 'jstep' => $request['jstep'], 'jstatus' => $request['jstatus'],'created_by_id' => $uid, 'cmp_id' => $request['cmp_id']

                    ]);
                    $job->cbranchs()
                        ->sync($request->input('cbranchs', []));
                            $job = $job->id;
                    return response(['id'=>$job]);

                }

            }
            else
            {

                $job = Job::create(['j_cat_id' => $request['j_cat_id'],'jname' => $request['jname'],'jmobile' => $request['jmobile'],'jemail' => $request['jemail'], 'jadd' => $request['jadd'], 'jentity' => $request['jentity'], 'jstep' => $request['jstep'], 'jstatus' => $request['jstatus'], 'created_by_id' => $uid

                ]);
                $job->cbranchs()
                    ->sync($request->input('cbranchs', []));
                            $job = $job->id;
                    return response(['id'=>$job]);

            }
        }

        else
        {
            $ad = Job::where('id', $request['job'])->first();
            $ad->update($validatedData);

            $job = $request['job'];

            return response(['id'=>$job]);
        }


		

		}


		public function createStep2(Job  $job)
		{

             $data['job']= $job;
			//$data['skills'] = Skill::all()->pluck('name', 'id');
			//$data['degrees'] = Degree::all()->pluck('name', 'id');


			 return (new JobResource($data));

		//return response(['job'=>$job]);
		}


		public function postCreateStep2(Request $request, Job  $job)
		{

			$validatedData = $request->validate([
				'job_t' => 'required',
				'job_dsc' => 'required',

				'jminsal' => 'required',
				'jminexp' => 'required',
				'jvacancy' => 'required',
				'jchat'   => '',
				'jtype'  => 'required',
				'jstep'  => 'required',
				'jstatus'  => 'required'


			]);

			$job = Job::where('id',$request['job_id'])->first();
			$job->update($validatedData);

			$job->skills()->sync($request->input('skills', []));
			$job->degrees()->sync($request->input('degrees', []));

	 // $job =$request['job_id'];





			return response(['job'=>$job]);


		}

		public function createStep3(Job  $job)
		{




			$job->load('job_cats','company','cbranchs','skills','degrees');

			return response(['job'=>$job]);
		}

	    /**
	     * Store a newly created resource in storage.
	     *
	     * @param  \Illuminate\Http\Request  $request
	     * @return \Illuminate\Http\Response
	     */
	    public function store(Request $request)
	    {

	    	$ip = request()->ip();

	    	$job = Job::where('id',$request['nid'])->update(['jstatus' => $request['jstatus'], 'ip' => $ip, 'jstep' => $request['jstep']]);

	    	$job = Job::find($request['nid']);
	       $datas = [

              'greeting' => 'Hi Admin',
            'title' => 'New Job '.$job['job_t'].' Created',

            'body' => 'For Job Details click on button',

            'module' => url(route('admin.jobs.edit', $job['id'])),

            'actionText' => 'View Job',

            'actionURL' => url(route('admin.jobs.edit', $job['id'])),

            'created_by_id' => $job['created_by_id']

        ];

        $user =User::first();
          
              $user->notify(new \App\Notifications\MySocialNotification($datas));

	    	return (new JobResource($job))
         ->response()
         ->setStatusCode(Response::HTTP_ACCEPTED);
	    }


	    public function edit(Job $job)
	    {
	    	abort_if(Gate::denies('ujob_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    	$job_categories = Jobcat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

	    	$job->load('job_cats','company','cbranchs','skills','degrees');

	    	return response(['job'=>$job]);
	    }

	    public function update(Request $request, Job $job)
	    {
	    	$job->update($request->all());

	    	return response(['job'=>$job]);
	    }

	    public function show(Job $job)
	    {
	    	abort_if(Gate::denies('ujob_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
$job->load('job_cats','company','cbranchs','skills','degrees');

			return response(['job'=>$job]);
	    }

	    public function destroy(Job $job)
	    {
	    	abort_if(Gate::denies('ujob_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    	$job->delete();

	    	return back();
	    }

	    public function massDestroy(MassDestroyJobRequest $request)
	    {
	    	Job::whereIn('id', request('ids'))->delete();

	    	return response(null, Response::HTTP_NO_CONTENT);
	    }
	}