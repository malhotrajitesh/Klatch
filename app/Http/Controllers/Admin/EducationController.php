<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEducationRequest;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Education;
use App\Profile;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EducationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('uedu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $educations = Education::all();

        return view('admin.educations.index', compact('educations'));
    }

    public function create()
    {
        abort_if(Gate::denies('uedu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.educations.create');
    }

    	function fetchdegree(Request $request)
		{
	// code for prouct name
			if($request->get('term'))
				$search = $request->search;

			if($request->get('search')){
				$search = $request->get('search');



				$employees = DB::table('educations')->select('degree_name')->where('degree_name', 'like', '%' .$search . '%')->limit(5)->groupBy('degree_name')->orderby('degree_name','asc')->get();

				$response = array();
				foreach($employees as $employee){
				

					$response[] = array("value"=>'8',"label"=>$employee->degree_name);
				}

				echo json_encode($response);
				exit;
			}
		}

    public function store(StoreEducationRequest $request)
    {
            $education = Education::where(['degree_name' => $request['degree_name'],'created_by_id' => $request['created_by_id']])->first();
        

            if($education)
            {
            	return back()->withInput($request->except('_token'))->withErrors(['This Degree'. $request['degree_name'].' Already Exist with This User ']);
            }
            else{
                 Education::create($request->all());

      $profile = Profile::where('created_by_id',$request['created_by_id'])->first();
      $profile->increment('cedu');
      if($profile->cedu == 1)
      {
     $profile->increment('prog',25);

      }

            	 return redirect()->back()->with('success','This Degree'. $request['degree_name'].' Added Successfully');
            }
      

       
    }

    public function edit(Education $education)
    {
        abort_if(Gate::denies('uedu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->load('created_by');

        return view('admin.educations.edit', compact('education'));
    }

    public function update(UpdateEducationRequest $request, Education $education)
    {
        $education->update($request->all());
       // return redirect()->route('admin.profiles.index');
       
return redirect()->back()->with(['Your Education Details'. $request['degree_name'].' Updated Successfully']);
      //return back()->withSuccess(['This Degree'. $request['degree_name'].' Updated Successfully']);
    }

    public function show(Education $education)
    {
        abort_if(Gate::denies('uedu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->load('created_by');

        return view('admin.educations.show', compact('education'));
    }

    public function destroy(Education $education)
    {
        abort_if(Gate::denies('uedu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->delete();
        $user_id = Auth()->user()->id;

        $profile = Profile::where('created_by_id',$user_id)->first();
      $profile->decrement('cedu');
      if($profile->cedu == 1)
      {
     $profile->decrement('prog',25);

      }

        return back();
    }

    public function massDestroy(MassDestroyEducationRequest $request)
    {
        Education::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
