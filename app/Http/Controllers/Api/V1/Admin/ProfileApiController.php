<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProfileRequest;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Profile;
use App\Experiance;
use App\Skill;
use App\Education;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProfileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ubio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      //  $user_id = Auth()->user()->id;
      //  $user = User::find($user_id);
        $skills = Skill::all()->pluck('name', 'id');
       // $skills = Skill::orderBy('name', 'asc')->select('name', 'id')->get();     
        $profile = Profile::first();
        $educations = Education::all();
                    
        $experiances = Experiance::all();
        return  response(['profile'=>$profile, 'skill'=>$skills,'education'=>$educations, 'experiance'=>$experiances]);
                   
        
    }

    public function create()
    {
        abort_if(Gate::denies('ubio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       
    }


    public function store(Request $request)
    {

            $profile=Profile::create($request->all());
            $profile->increment('prog',25);

             return  response(['profile'=>'Your Profile Data Added Successfully'])
             ->setStatusCode(Response::HTTP_ACCEPTED);
               //  return redirect()->route('admin.profiles.index');
      

       
    }

     public function pskill(Request $request)
    {

             $profile=Profile::where('id',$request['pid'])->first();

            $profile->skills()->sync($request->input('skills', []));

              $profile->increment('cskill');
      if($profile->cskill == 1)
      {
     $profile->increment('prog',25);

      }
             
              return  response(['skill'=>'Skill Added Successfully'])
             ->setStatusCode(Response::HTTP_ACCEPTED);
              //   return redirect()->route('admin.profiles.index');
      

       
    }

    public function edit(Profile $profile)
    {
        abort_if(Gate::denies('ubio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->load('created_by');

        return  response(['profile'=>$profile])
             ->setStatusCode(Response::HTTP_ACCEPTED);
    }


public function uploadpic(Request $request)
{
      request()->validate([
            'propic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      $id = Auth()->user()->id;
 
        $files = $request->file('propic');
            
            $destinationPath = 'public/image/';
            $fileName =  $id.time().'.'.$request->propic->getClientOriginalExtension();
             $files->move($destinationPath, $fileName);
     

        $profile = Profile::first();
        $profile->propic = $fileName;

 $profile->save();
 return  response(['picture'=>'Pic Uploaded Successfully'])
             ->setStatusCode(Response::HTTP_ACCEPTED);
        


}

    public function update(Request $request, Profile $profile)
    {
        

             $profile->update($request->all());
         
          

       
//return redirect()->back()->with('success','Your Profile updated Successfully');
return  response(['profile'=>'Profile Updated Successfully'])
             ->setStatusCode(Response::HTTP_ACCEPTED);
            }

    public function profilev(request $request)
    {
        $pid=$request->pid;
        $uid=$request->uid;
        $jid=$request->jid;
       // abort_if(Gate::denies('ubio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       

      $profiles = DB::table('profiles')->where('id',$pid)->where('created_by_id',$uid)->get();
        $skills = DB::table('skills')
        ->rightJoin('skill_profile', 'skills.id', '=', 'skill_profile.skill_id')
        ->where('skill_profile.profile_id', $pid)
         ->select('skills.name')->get(); 

    

 
       
        $educations = DB::table('educations')->where('created_by_id',$uid)->get();
                    
        $experiances = DB::table('experiances')->where('created_by_id',$uid)->get();
       

      
        return  response(['profiles'=>$profiles, 'skill'=>$skills,'education'=>$educations, 'experiance'=>$experiances,'uid'=>$uid, 'jid'=>$jid]);
    }

    public function show(Profile $profile)
    {
       // abort_if(Gate::denies('ubio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    	$profile->load('created_by');

        return  response(['profile'=>$profile])
             ->setStatusCode(Response::HTTP_ACCEPTED);

   

        return view('admin.profiles.show', compact('profile'));
    }

    public function destroy(Profile $profile)
    {
        abort_if(Gate::denies('ubio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->delete();

        return back();
    }

    public function massDestroy(MassDestroyProfileRequest $request)
    {
        Profile::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
