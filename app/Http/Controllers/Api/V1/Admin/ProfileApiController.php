<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Traits\MultiTenantModelTrait;
use App\Http\Requests\MassDestroyProfileRequest;
use App\Http\Requests\StoreProfileRequest;

use App\Profile;
use App\Experiance;
use App\Skill;
use App\Ufollow;
use App\User;
use App\Education;
use App\Certification;
use Validator;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProfileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('ubio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user_id = Auth()->user()->id;
          $allskill = Skill::all();
         $ufollow= User::where('id',$user_id)->select('id')->withCount(['followings', 'followables','ads','jobs','events','socials'])->first();
          $profile = Profile::where('created_by_id',$user_id)->with(['skills'])->first();
          $educations = Education::orderBy('e_from', 'DESC')->get();
           $certifications = Certification::orderBy('cert_date', 'DESC')->get();          
          $experiances = Experiance::orderBy('estart', 'DESC')->get();
        return  response(['profile'=>$profile, 'allskill'=>$allskill, 'education'=>$educations, 'experiance'=>$experiances, 'certification'=>$certifications,'ufollow'=>$ufollow]);
                   
        
    }

    public function create()
    {
        abort_if(Gate::denies('ubio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       
    }

     public function oldskill()
    {
    $user_id = Auth()->user()->id;    
 $skill = Profile::where('created_by_id',$user_id)->with(['skills'])->first();
 return  response(['skill'=>$skill]);
       
    }


    public function store(Request $request)
    {

            $profile=Profile::create($request->all());
            $profile->increment('prog',25);

             return  response(['profile'=>'Your Profile Data Added Successfully'])
             ->setStatusCode(Response::HTTP_ACCEPTED);
               //  return redirect()->route('admin.profiles.index');
      

       
    }


    public function addskill(Request $request)
    {
  $validatedData = $request->validate(['name' => 'unique:skills']);
$skill = Skill::create($request->all());
  $user_id = Auth()->user()->id;    
 
             $profile=Profile::where('created_by_id',$user_id)->first();
             DB::table('skill_profile')->insert(
    ['profile_id' => $profile->id, 'skill_id' => $skill->id]
);


              return  response(['skill'=> $skill])
             ->setStatusCode(Response::HTTP_ACCEPTED);

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

// code for check image is base 64 use in now
    public  function is_base64($str){
        if($str === base64_encode(base64_decode($str))){
            return true;
        }
        return false;
    }

public function uploadpic(Request $request)
{
     
      $id = Auth()->user()->id;

       $destinationPath = 'public/image/';

  $str = $request->input('propic');
 $imageName = $id."pic-".time() . '.'.'jpg';
 $file =  $destinationPath.$imageName;
file_put_contents($file,base64_decode($str));

        $profile = Profile::where('created_by_id',$id)->first();
        $profile->update(['propic' => $imageName]);

 return  response(['picture'=>'Pic Uploaded Successfully'])
             ->setStatusCode(Response::HTTP_ACCEPTED);
        
}

/* Updated  on 23 March 22 */

public function uploadresume(Request $request)
{

 
    $id = Auth()->user()->id;
 $destinationPath2 = 'public/image/uresume/';
    $str2 = $request->input('resume');
    $imageName = $request['pdf_name'];
 //$imageName = $id."api-resum".time() . '.'.'pdf';
 $file2 =  $destinationPath2.$imageName;
file_put_contents($file2,base64_decode($str2));

              
              $profile = Profile::where('created_by_id',$id)->first();
        $profile->resume = $imageName;

 $profile->save();

            return response(["success" => true,"message" => "File successfully uploaded","file" => $imageName]);
 

}

/* Added on 23 March 21 End Here*/

    public function profileupdate(Request $request)
    {
        
             $user_id = Auth()->user()->id;
        $profile=Profile::where('created_by_id',$user_id)->update($request->all());
        User::where('id',$user_id)->update(['mobile' =>$request->mobile,'name' =>$request->name]);

return  response(['profile'=>'Profile Updated Successfully'])
             ->setStatusCode(Response::HTTP_ACCEPTED); /* Added on 17 March 21 */
            }

  public function skilldel(request $request)
    {
        $pid=$request->pid;
        $sid=$request->sid;
            $educations = DB::table('skill_profile')->where('profile_id',$pid)->where('skill_id',$sid)->delete();
             return response(["deleted" => $educations]);
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

     public function myfollowers(Request $request)
    { 
       $uidx =auth()->user()->id;
      $mfx=  Ufollow::where('user_id',$uidx)->pluck('followable_id');
     $snx= Profile::whereIn('created_by_id', $mfx)->select('id','name','lname','created_by_id','propic')->get();

 
    return response(['data'=> $snx]);
}
     public function mefollow(Request $request)
    { 
       $uidx =auth()->user()->id;
      $mfx=  Ufollow::where('followable_id',$uidx)->pluck('user_id');
     $snx= Profile::whereIn('created_by_id', $mfx)->select('id','name','lname','created_by_id','propic')->get();

 
    return response(['data'=> $snx]);
}

  public function omyfollow(Request $request)
    { 
          $uid=$request->uid;
      $mfx=  Ufollow::where('user_id',$uid)->pluck('followable_id');
     $snx= Profile::whereIn('created_by_id', $mfx)->select('id','name','lname','created_by_id','propic')->get();

 
    return response(['data'=> $snx]);
}
     public function omefollow(Request $request)
    { 
      $uid=$request->uid;
      
      $mfx=  Ufollow::where('followable_id',$uid)->pluck('user_id');
     $snx= Profile::whereIn('created_by_id', $mfx)->select('id','name','lname','created_by_id','propic')->get();

 
    return response(['data'=> $snx]);
}


}
