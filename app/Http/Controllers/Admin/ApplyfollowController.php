<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	
	use App\Follow;

	use App\Applyfollow;
use App\Userfollow;
	use Gate;
	use Illuminate\Http\Request;
	use Symfony\Component\HttpFoundation\Response;


	class ApplyfollowController extends Controller
	{
		public function index()
		{
			abort_if(Gate::denies('unlike_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

			$follows = Follow::latest()->get();

			return view('admin.applyfollows.index', compact('follows'));
		}

		


		public function create()
		{
			abort_if(Gate::denies('unlike_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
	/*
	      
	  */
	}

	    	



 public function viewlist($follow)
	    {


  $profiles=Userfollow::leftjoin('profiles', 'user_follow.user_id', '=', 'profiles.created_by_id')
                ->where('user_follow.follow_id', $follow)->get();


      return view('admin.applyfollows.viewlist', compact('profiles'));


	    }




 public function eintested(Request $request){

    $userId = Auth()->user()->id;



    $a_like = Userfollow::withTrashed()->where('user_id',$userId)->where('follow_id', '=', $request->follow)->first();

    if (is_null($a_like)) {
        $interest = Userfollow::create(['user_id' => $userId,'follow_id' => $request->follow]);
        Applyfollow::where('id', '=', $request->follow)->increment('so_like');
        $output = '1';
        echo $output;
    } else {
        if (is_null($a_like->deleted_at)) {
            $a_like->delete();
            Applyfollow::where('id', '=', $request->follow)->decrement('so_like');
            $output = '2';
            echo $output;
        } else {
            $a_like->restore();
           Applyfollow::where('id', '=', $request->follow)->increment('so_like');
            $output = '1';
            echo $output;
        }
    }

}




	    public function store(Request $request)
	    {

// code active for intersetd person assiign

	    	$ads = Userfollow::where('user_id',$request['uid'])->where('follow_id',$request['eid'])->update(['status' => $request['status']]);

	    
	

	    	return back()->with('success','Successfuly Assign');
	    }




     public function appliedevent(Request $request)
    {
      // code for applied events
          $user_id = Auth()->user()->id;

                    $apli=Userfollow::where('user_id',$user_id)->select('follow_id')->get();


          $applyfollows=applyfollow::whereIn('id', $apli)->get();
 
   
    
return view('admin.applyfollows.getevent', compact('applyfollows'));
    }

	    public function edit(Applyjob $applyjob)
	    {
	    	abort_if(Gate::denies('unlike_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    	

	    	return view('admin.Applyjobs.edit', compact('applyjob_categories', 'applyjob'));
	    }

	    public function update(UpdateApplyjobRequest $request, Applyjob $applyjob)
	    {
	    	$Applyjob->update($request->all());

	    	return redirect()->route('admin.Applyjobs.index');
	    
}
	    public function show(applyfollow $applyfollow)
	    {
	    
	    	
	    
                $applyfollow->increment('ev_view');
           

	    

	    	return view('admin.applyfollows.show', compact('applyfollow'));
	    }

	    public function destroy(Applyjob $applyjob)
	    {
	    	abort_if(Gate::denies('unlike_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    	//$Applyjob->delete();

	    	return back();
	    }

	 
	}
