<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEducationRequest;
use App\Http\Requests\StoreEducationRequest;
use App\Http\Requests\UpdateEducationRequest;
use App\Education;
use App\Profile;
use URL;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EducationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('uedu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $educations = Education::all();


        return  response(['education'=>$educations]);
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
        return  response(['education'=>$response]);
			
							}
		}

 function fetchdegreen(Request $request)
    {

   
                     
        $employees = DB::table('educations')->select('degree_name')->groupBy('degree_name')->orderby('degree_name','asc')->get();

        $response = array();
        foreach($employees as $employee){
        

          $response[] = array("value"=>'8',"label"=>$employee->degree_name);
        }
        return  response(['degree'=>$response]);
      
         
    }

     public function uvabanner()
    {
      
    $datab = glob("public/image/uvabanner/*.*");
       $uvaban = array();
        foreach($datab as $employe){
        

          $uvaban[] = asset($employe);
        }

    
 
 return response(['uvabanner'=> $uvaban]);
    }


     function fetchcollege(Request $request)
    {

   
                     
        $employees = DB::table('educations')->select('college')->groupBy('college')->orderby('college','asc')->get();

        $response = array();
        foreach($employees as $employee){
        

          $response[] = array("value"=>'8',"label"=>$employee->college);
        }
        return  response(['college'=>$response]);
      
         
    }

     function fetchfos(Request $request)
    {

   
                     
        $employees = DB::table('educations')->select('fos')->groupBy('fos')->orderby('fos','asc')->get();

        $response = array();
        foreach($employees as $employee){
        

          $response[] = array("value"=>'8',"label"=>$employee->fos);
        }
        return  response(['fos'=>$response]);
      
         
    }




    public function store(StoreEducationRequest $request)
    {
            $education = Education::where(['degree_name' => $request['degree_name']])->first();
        

            if($education)
            {
                $response= 'This Degree'. $request['degree_name'].' Already Exist with This User ';
                      return  response(['Error'=>$response]);

            	
            }
            else{
                 Education::create($request->all());

    $user_id = Auth()->user()->id;
              $profile = Profile::where('created_by_id',$user_id)->first();
       $profile->increment('cedu');
       if($profile->cedu == 1)
       {
     $profile->increment('prog',25);

     }

$response= 'This Degree'. $request['degree_name'].' Added Successfully';
                      return  response(['Success'=>$response]);
            }
      

       
    }

    public function edit(Education $education)
    {
        abort_if(Gate::denies('uedu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->load('created_by');
        return  response(['Edit'=>$education]);

        
    }

    public function update(UpdateEducationRequest $request, Education $education)
    {
        $education->update($request->all());
       // return redirect()->route('admin.profiles.index');
                return  response(['Updated'=>'Your Education Details'. $request['degree_name'].' Updated Successfully']);


    }

    public function show(Education $education)
    {
        abort_if(Gate::denies('uedu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->load('created_by');

                return  response(['Show Education'=>$education]);


        
    }

    public function destroy(Education $education)
    {
        abort_if(Gate::denies('uedu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $education->delete();
        $user_id = Auth()->user()->id;

        $profile = Profile::where('created_by_id',$user_id)->first();
              if($profile->cedu == 1)
      {
     $profile->decrement('prog',25);

      }
         if($profile->cedu != 0)
      {
      $profile->decrement('cedu');
    }
      

                return  response(['Deleted'=>'Successfully']);

       
    }

    public function massDestroy(MassDestroyEducationRequest $request)
    {
        Education::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
