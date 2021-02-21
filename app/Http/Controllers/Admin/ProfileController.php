<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\MultiTenantModelTrait;
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

class ProfileController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ubio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_id = Auth()->user()->id;
      //  $user = User::find($user_id);
        $skills = Skill::all()->pluck('name', 'id');
       // $skills = Skill::orderBy('name', 'asc')->select('name', 'id')->get();     
        $profile = Profile::where('created_by_id',$user_id)->first();
        $educations = Education::all();
                    
        $experiances = Experiance::all();
                   
        return view('admin.profiles.index', compact('profile','experiances', 'skills', 'educations'));
    }

    public function create()
    {
        abort_if(Gate::denies('ubio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.profiles.create');
    }


    public function store(Request $request)
    {

            $profile=Profile::create($request->all());
            $profile->increment('prog',25);

            return redirect()->back()->with('success','Your Profile Data Added Successfully');

               //  return redirect()->route('admin.profiles.index');
      

       
    }

      public function viewprofile($upid)
    {
     abort_if(Gate::denies('admin_profile_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
         $profile = Profile::where('created_by_id',$upid)->first();

         $skills = DB::table('skills')
        ->rightJoin('skill_profile', 'skills.id', '=', 'skill_profile.skill_id')
        ->where('skill_profile.profile_id', $profile['id'])
         ->select('skills.name')->get();   
    
        $educations = Education::where('created_by_id',$upid)->get();
                    
        $experiances = Experiance::where('created_by_id',$upid)->get();
                   
        return view('admin.profiles.userprofile', compact('profile','experiances', 'skills', 'educations'));
       
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
             return redirect()->back()->with('success','This Skills Added Successfully');
              //   return redirect()->route('admin.profiles.index');
      

       
    }

    public function edit(Profile $profile)
    {
        abort_if(Gate::denies('ubio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $profile->load('created_by');

        return view('admin.profiles.edit', compact('profile'));
    }


public function uploadpic(Request $request)
{
      request()->validate([
            'propic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
      $id = Auth()->user()->id;
 
        if ($files = $request->file('propic')) {
            
            $destinationPath = 'public/image/';
            $fileName =  $id.time().'.'.$request->propic->getClientOriginalExtension();
             $files->move($destinationPath, $fileName);
         }
         else{
            $fileName = "prdefault.jpg";
         }

        $profile = Profile::first();
        $profile->propic = $fileName;

 $profile->save();
        return redirect()->back()->with('success','Pic uploaded Successfuly');


}

    public function update(Request $request, Profile $profile)
    {
        

             $profile->update($request->all());
         
          

       
return redirect()->back()->with('success','Your Profile updated Successfully');
        //return redirect()->route('admin.profiles.index');
    }

    public function profilev($pid,$uid,$jid)
    {
       // abort_if(Gate::denies('ubio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      $profiles = DB::table('profiles')->where('id',$pid)->where('created_by_id',$uid)->get();
        $skills = DB::table('skills')
        ->rightJoin('skill_profile', 'skills.id', '=', 'skill_profile.skill_id')
        ->where('skill_profile.profile_id', $pid)
         ->select('skills.name')->get(); 

    

 
       // $profile->load('skills');
        $educations = DB::table('educations')->where('created_by_id',$uid)->get();
                    
        $experiances = DB::table('experiances')->where('created_by_id',$uid)->get();
       

        return view('admin.profiles.show', compact('profiles','skills','educations','experiances','uid','jid'));
    }

    public function show(Profile $profile)
    {
       // abort_if(Gate::denies('ubio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

   

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
