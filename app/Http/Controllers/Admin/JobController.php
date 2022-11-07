<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJobRequest;


use App\Job;
use App\User;
use App\Jprofile;
use App\Cbranch;
use App\Jobcat;
use App\Adentity;
use App\Skill;
use App\Profile;
use App\Degree;
use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Traits\WebmeTrait;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
    use  WebmeTrait;

    public function index()
    {
        abort_if(Gate::denies('ujob_access') , Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobs = Job::all();

        return view('admin.jobs.index', compact('jobs'));
    }

    function fetchname(Request $request)
    {
        // code for prouct name
        if ($request->get('term')) $search = $request->search;

        if ($request->get('search'))
        {
            $search = $request->get('search');

            $employees = Jprofile::orderby('cmname', 'asc')
                ->where('cmname', 'like', '%' . $search . '%')->limit(5)
                ->with('cbranchs')
                ->get();

            $response = array();
            foreach ($employees as $employee)
            {
                $output = '';
                foreach ($employee->cbranchs as $object)
                {
                    $output .= '<option value="' . $object->id . '">' . $object->name . '</option>';
                }

                $response[] = array(
                    "value" => $employee->id,
                    "label" => $employee->cmname,
                    "email" => $employee->email,
                    "logo" => $employee->logo,
                    "cname" => $employee->cpname,
                    "mno" => $employee->contact_no,
                    "pan" => $employee->pan_nmbr,
                    "cert" => $employee->inco_cert,
                    "cbranch" => $output
                );
            }

            echo json_encode($response);
            exit;
        }
    }

    public function create()
    {
        abort_if(Gate::denies('ujob_create') , Response::HTTP_FORBIDDEN, '403 Forbidden');
        /*
        $job_categories = Jobcat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $skills = Skill::all()->pluck('name', 'id');
        $cbranchs = Cbranch::all()->pluck('name', 'id');
        
        return view('admin.jobs.create', compact('job_categories','skills','cbranchs'));
        */
    }


  public function jpxiew()
    {
        abort_if(Gate::denies('ujob_create') , Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        $job_categories = Jobcat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
     
        
        return view('admin.jobs.jpuva', compact('job_categories'));
        
    }

public function jpstore(Request $request)
    {

$validatedData= $request->all();

  $uid= auth()->user()->id;

        $uid= auth()->user()->id;

                    $files1 = $request->file('jppica');
                 //   $files2 = $request->file('jppicb');
                 
                   $destinationPath = 'public/image/clogo/';
                   
                    if (isset($files1))
                    {
                       $fileName1 = $uid."-a-jp-web" . time() . '.' . $request->jppica->getClientOriginalExtension();

                        $files1->move($destinationPath, $fileName1);
                        $validatedData['jppica'] = $fileName1;

                        }
/*
                    if (isset($files2))
                    {
                       $fileName2 = $uid."-b-jp-web" . time() . '.' . $request->jppicb->getClientOriginalExtension();

                        $files2->move($destinationPath, $fileName2);
                        $validatedData['jppicb'] = $fileName2;

                        }    */

                 Jprofile::create($validatedData);

                 $response= 'This jprofile 
                    '. $request['name'].' Added Successfully';
                      return response(null, Response::HTTP_NO_CONTENT);
           
}


  


    public function pendjob(Request $request)
    {

        $gol = $request->njob;

        // $userId = Auth::user()->id;
        $job = Job::where('id', $gol)->where('jstatus', '=', 'UNFINISHED')
            ->first();
        if ($job)
        {

            if ($job->jstep == 1)
            {

                $job = $job->id;
                return redirect()
                    ->route('admin.jobs.create-step2', $job);

            }
            elseif ($job->jstep == 2)
            {

                $job = $job->id;
                return redirect()
                    ->route('admin.jobs.create-step3', $job);
            }

        }
        else
        {
            return response(['msg' => 'No Pending Ad Found', 'ad' => $job]);
        }

    }

    public function createStep1(Request $request)
    {

        if (isset($request->job))
        {
            $asd = $request->get('job');
            $job = Job::where('id', $asd)->first();
            $job->load('jprofiles');

          

            return view('admin.jobs.create-step1', compact('job'));
        }
        else
        {

          $jprofiles =  Jprofile::latest()->with('jobcategry')->get(); 

            return view('admin.jobs.create-step1', compact('jprofiles'));

        }

    }

    public function postCreateStep1(Request $request)
    {

        $validatedData = $request->validate([

        'jstep' => 'required', 'jstatus' => 'required'

        ]);
     

        if (!isset($request->job))

        {
            $job = Job::create(['jstep' => 1, 'jstatus' => 'UNFINISHED', 'cmp_id' => $request['cmp_id']

                    ]);
            return redirect()->route('admin.jobs.create-step2', $job->id);
        }

        else
        {
            $ad = Job::where('id', $request['job'])->first();
            $ad->update($validatedData);

            $job = $request['job'];
        }

        return redirect()->route('admin.jobs.create-step2', $job);

    }

    public function createStep2(Job $job)
    {

        $skills = Skill::all()->pluck('name', 'id');
        $degrees = Degree::all()->pluck('name', 'id');

        return view('admin.jobs.create-step2', compact('job', 'skills', 'degrees'));
    }

    public function postCreateStep2(Request $request, Job $job)
    {

        $validatedData = $request->validate(['job_t' => 'required', 'job_dsc' => 'required',

        'jminsal' => 'required',  'jminexp' => 'required', 'jmini' => 'max:15',  'jmax' => 'max:15', 'jvacancy' => 'required','jchat' => '', 'jtype' => 'required', 'jstep' => 'required', 'jstatus' => 'required'

        ]);

        $job = Job::where('id', $request['job_id'])->first();
        $job->update($validatedData);

        $job->skills()
            ->sync($request->input('skills', []));
        $job->degrees()
            ->sync($request->input('degrees', []));

        // $job =$request['job_id'];
        

        return redirect()
            ->route('admin.jobs.create-step3', $job);

    }

    public function createStep3(Job $job)
    {

        $job->load('jprofiles', 'skills', 'degrees');

        return view('admin.jobs.create-step3', compact('job'));
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

        $ads = Job::where('id', $request['nid'])->update(['jstatus' => $request['jstatus'], 'ip' => $ip, 'jstep' => $request['jstep']]);

        $job = Job::find($request['nid']);
         
             $uid=$job['created_by_id'];
              $fdata = $job['job_t'];
              $a_admin=1;
              $mf='store';
          $mc='Job';
               
                  $this->notidata($uid,$fdata,$a_admin,$mf,$mc);

          
              $user->notify(new \App\Notifications\MySocialNotification($datas));
        return redirect()->route('admin.jobs.index')->withSuccess('Job created Successfully and under review ');
    }

    public function edit(Job $job)
    {
        //abort_if(Gate::denies('ujob_edit') , Response::HTTP_FORBIDDEN, '403 Forbidden');
        
               $uid=$job->created_by_id;
              $fdata = $job->job_t;
              $a_admin=0;
              $mf='process';
              $mc='Job';
       $this->notidata($uid,$fdata,$a_admin,$mf,$mc);
        $job->load('jprofiles', 'skills', 'degrees','created_by');
      return view('admin.jobmasters.edit', compact('job'));
    }

    public function update(Request $request, Job $job)
    {
        
        $expiry_day = Carbon::now()->addDays($request['exp_date']);

$user_id = Auth()->user()->id;

    $uid=$job['created_by_id'];
              $fdata = $job['job_t'] .' is '. $request['jstatus'];
              $a_admin=0;
              $mf='verify';
              $mc='Job';
               
                  $this->notidata($uid,$fdata,$a_admin,$mf,$mc);


        $job->update(['jstatus' => $request['jstatus'], 'jexp_date' => $expiry_day,'approved_by_id' => $user_id]);
    

        return redirect()->route('admin.jobmasters.index')->withSuccess('job Verified Successfully '); 
    }

    public function show(Job $job)
    {
        abort_if(Gate::denies('ujob_show') , Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->load('ad_cats', 'created_by');

        return view('admin.jobs.show', compact('job'));
    }

     public function closejob(Request $request)
    {

   
       $ads = Job::where('id',$request->njob)->update(['jstatus' => 'CLOSED']);

        return back();
    }


    public function destroy(Job $job)
    {
        abort_if(Gate::denies('ujob_delete') , Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobRequest $request)
    {
        Job::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    
     public function destroyj(Jprofile $jprofile)
    {
      //  abort_if(Gate::denies('pcerti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $jprofile->delete();
        return redirect()->route('admin.jobs.create-step1')->with('message','Operation Successful');
  

         
    }

}