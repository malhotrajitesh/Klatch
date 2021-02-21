<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJobRequest;

use App\Job;
use App\Company;
use App\Cbranch;
use App\Jobcat;
use App\Skill;
use App\Degree;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobController extends Controller
{
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

            $employees = Company::orderby('cmname', 'asc')->select('id', 'cmname', 'email', 'logo', 'cpname', 'contact_no', 'pan_nmbr', 'inco_cert')
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
            $job->load('Job_cats', 'company');

            $job_categories = Jobcat::all()->pluck('name', 'id')
                ->prepend(trans('global.pleaseSelect') , '');

            $cbranchs = Cbranch::all()->pluck('name', 'id');
            $jlocs = Cbranch::all()->pluck('name', 'id');

            return view('admin.jobs.create-step1', compact('job', 'job_categories', 'cbranchs', 'jlocs'));
        }
        else
        {

            $job_categories = Jobcat::all()->pluck('name', 'id')
                ->prepend(trans('global.pleaseSelect') , '');

            $cbranchs = Cbranch::all()->pluck('name', 'id');
            $jlocs = Cbranch::all()->pluck('name', 'id');

            return view('admin.jobs.create-step1', compact('job_categories', 'cbranchs', 'jlocs'));

        }

    }

    public function postCreateStep1(Request $request)
    {

        $validatedData = $request->validate([

        'jstep' => 'required', 'jstatus' => 'required'

        ]);

        if (!isset($request->job))

        {

            if ($request->jentity != 'Individual')
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

                    $company = Company::create(['cmname' => $request['cmp_name'], 'cpname' => $request['cpname'], 'pan_nmbr' => $request['pan_nmber'], 'city' => $request['city'], 'state' => $request['state'], 'contact_no' => $request['contact_no'], 'email' => $request['email'], 'created_by_id' => $request['created_by_id'], 'inco_cert' => $fileName2, 'logo' => $fileName

                    ]);

                    $company->cbranchs()
                        ->sync($request->input('cbranchs', []));

                    $ncid = $company->id;

                    $job = Job::create(['j_cat_id' => $request['j_cat_id'], 'jentity' => $request['jentity'], 'jstep' => $request['jstep'], 'jstatus' => $request['jstatus'], 'created_by_id' => $request['created_by_id'], 'cmp_id' => $ncid

                    ]);

                    $job->cbranchs()
                        ->sync($request->input('cbranchs', []));
                    $job = $job->id;
                    return redirect()
                        ->route('admin.jobs.create-step2', $job);

                }

                else
                {

                    $job = Job::create(['j_cat_id' => $request['j_cat_id'], 'jentity' => $request['jentity'], 'jstep' => $request['jstep'], 'jstatus' => $request['jstatus'], 'cmp_id' => $request['cmp_id']

                    ]);
                    $job->cbranchs()
                        ->sync($request->input('cbranchs', []));

                }

            }
            else
            {

                $job = Job::create(['j_cat_id' => $request['j_cat_id'], 'jentity' => $request['jentity'], 'jstep' => $request['jstep'], 'jstatus' => $request['jstatus'], 'created_by_id' => $request['created_by_id']

                ]);
                $job->cbranchs()
                    ->sync($request->input('cbranchs', []));

            }
        }

        else
        {
            $ad = Job::where('id', $request['job'])->first();
            $ad->update($validatedData);

            $job = $request['nid'];
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

        'jminsal' => 'required', 'jmaxsal' => 'required', 'jminexp' => 'required', 'jmaxexp' => 'required', 'jtype' => 'required', 'jstep' => 'required', 'jstatus' => 'required'

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

        $job->load('job_cats', 'company', 'cbranchs', 'skills', 'degrees');

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
        //   $ad = $job;
        //     $ad->notify(new \App\Notifications\ToEmail( $ad ) );
        //   Mail::to($job)->send($job);
        return redirect()->route('admin.jobs.index');
    }

    public function edit(Job $job)
    {
        abort_if(Gate::denies('ujob_edit') , Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job_categories = Jobcat::all()->pluck('name', 'id')
            ->prepend(trans('global.pleaseSelect') , '');

        $job->load('ad_cats', 'created_by');

        return view('admin.jobs.edit', compact('job_categories', 'job'));
    }

    public function update(UpdateJobRequest $request, Job $job)
    {
        $job->update($request->all());

        return redirect()
            ->route('admin.jobs.index');
    }

    public function show(Job $job)
    {
        abort_if(Gate::denies('ujob_show') , Response::HTTP_FORBIDDEN, '403 Forbidden');

        $job->load('ad_cats', 'created_by');

        return view('admin.jobs.show', compact('job'));
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
}