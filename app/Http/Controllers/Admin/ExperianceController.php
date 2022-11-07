<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExperianceRequest;
use App\Http\Requests\StoreExperianceRequest;
use App\Http\Requests\UpdateExperianceRequest;
use App\Experiance;
use App\Profile;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ExperianceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('uwork_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experiances = Experiance::all();

        return view('admin.experiances.index', compact('experiances'));
    }

    public function create()
    {
        abort_if(Gate::denies('uwork_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.experiances.create');
    }
/*
    	function fetchdegree(Request $request)
		{
	// code for prouct name
			if($request->get('term'))
				$search = $request->search;

			if($request->get('search')){
				$search = $request->get('search');



				$employees = DB::table('experiances')->select('degree_name')->where('degree_name', 'like', '%' .$search . '%')->limit(5)->groupBy('degree_name')->orderby('degree_name','asc')->get();

				$response = array();
				foreach($employees as $employee){
				

					$response[] = array("value"=>'8',"label"=>$employee->degree_name);
				}

				echo json_encode($response);
				exit;
			}
		}
        */

    public function store(StoreExperianceRequest $request)
    {
        //    $experiance = Experiance::where(['degree_name' => $request['degree_name'],'created_by_id' => $request['created_by_id']])->first();
        
/*
            if($experiance)
            {
            	return back()->withInput($request->except('_token'))->withErrors(['This Degree'. $request['degree_name'].' Already Exist with This User ']);
            }
            else{
                 
            }
*/
            Experiance::create($request->all());

              $profile = Profile::where('created_by_id',$request['created_by_id'])->first();
      $profile->increment('cwork');
      if($profile->cwork == 1)
      {
     $profile->increment('prog',25);

      }


            
            return redirect()->back()->with('success','This Degree'. $request['exp_type'].' Added Successfully');

              //   return redirect()->route('admin.experiances.index');
      

       
    }

    public function edit(Experiance $experiance)
    {
        abort_if(Gate::denies('uwork_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experiance->load('created_by');

        return view('admin.experiances.edit', compact('experiance'));
    }

    public function update(UpdateExperianceRequest $request, Experiance $experiance)
    {
        $experiance->update($request->all());

        return redirect()->back()->with(['Your Experiance'. $request['exp_type'].' Updated Successfully']);

       // return redirect()->route('admin.experiances.index');
    }

    public function show(Experiance $experiance)
    {
        abort_if(Gate::denies('uwork_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experiance->load('created_by');

        return view('admin.experiances.show', compact('experiance'));
    }

    public function destroy(Experiance $experiance)
    {
       // abort_if(Gate::denies('uwork_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experiance->delete();
             $user_id = Auth()->user()->id;

        $profile = Profile::where('created_by_id',$user_id)->first();
      $profile->decrement('cwork');
      if($profile->cwork == 1)
      {
     $profile->decrement('prog',25);

      }

        return back();
    }

    public function massDestroy(MassDestroyExperianceRequest $request)
    {
        Experiance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
