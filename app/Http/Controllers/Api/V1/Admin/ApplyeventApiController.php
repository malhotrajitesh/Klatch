<?php

	namespace App\Http\Controllers\Api\V1\Admin;

	use App\Http\Controllers\Controller;
	

	use App\Applyevent;
use App\Userevent;
use App\Saveevent;
	use Gate;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use Symfony\Component\HttpFoundation\Response;


	class ApplyeventApiController extends Controller
	{
		public function index()
		{
			abort_if(Gate::denies('naukri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

			$applyevents = Applyevent::latest()->where('ev_status', '=', 'Approve')->get();

       return response(['msg'=>'all data','applyevent'=>$applyevents]);

			
		}

		


		public function create()
		{
			abort_if(Gate::denies('naukri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
	/*
	      
	  */
	}





 public function viewlist($ivent)
	    {


  $profiles=Userevent::leftjoin('profiles', 'user_ivent.user_id', '=', 'profiles.created_by_id')
                ->where('user_ivent.ivent_id', $ivent)->get();

 return response(['msg'=>'Interested Person List','applyevents'=>$profiles]);



	    }




 public function eintested(Request $request){

    $userId = Auth()->user()->id;



    $a_like = Userevent::withTrashed()->where('user_id',$userId)->where('ivent_id', '=', $request->ivent)->first();

    if (is_null($a_like)) {
        $interest = Userevent::create(['user_id' => $userId,'ivent_id' => $request->ivent]);
        Applyevent::where('id', '=', $request->ivent)->increment('ev_interest');
        $output = '1';
        return response(['msg'=>'Interested Added','applyevents'=>$output]);
        
    } else {
        if (is_null($a_like->deleted_at)) {
            $a_like->delete();
            Applyevent::where('id', '=', $request->ivent)->decrement('ev_interest');
            $output = '2';
             return response(['msg'=>'Interested removed','applyevents'=>$output]);
            
        } else {
            $a_like->restore();
           Applyevent::where('id', '=', $request->ivent)->increment('ev_interest');
            $output = '1';
            return response(['msg'=>'Interested Again Added','applyevents'=>$output]);
            echo $output;
        }
    }

}

 public function evbook(Request $request){

    $userId = Auth()->user()->id;



    $a_like = Saveevent::withTrashed()->where('user_id',$userId)->where('ivent_id', '=', $request->ivent)->first();

    if (is_null($a_like)) {
        $interest = Saveevent::create(['user_id' => $userId,'ivent_id' => $request->ivent]);
        Applyevent::where('id', '=', $request->ivent)->increment('ev_save');
        $output = '1';
        return response(['msg'=>'Bookmark Added','applyevents'=>$output]);
        echo $output;
    } else {
        if (is_null($a_like->deleted_at)) {
            $a_like->delete();
            Applyevent::where('id', '=', $request->ivent)->decrement('ev_save');
            $output = '2';
             return response(['msg'=>'Bookmarked removed','applyevents'=>$output]);
            
        } else {
            $a_like->restore();
           Applyevent::where('id', '=', $request->ivent)->increment('ev_save');
            $output = '1';
            return response(['msg'=>'Bookmarked Again Added','applyevents'=>$output]);
            echo $output;
        }
    }

}


	    public function store(Request $request)
	    {

// code active for intersetd person assiign

	    	$ads = Userevent::where('user_id',$request['uid'])->where('ivent_id',$request['eid'])->update(['status' => $request['status']]);    
	 return response(['msg'=>'Interest Assign','Status'=>$request['status']]);

	    }


  public function getsaveevent(Request $request)
    {
       // active codde for saved evnts
          $user_id = Auth()->user()->id;

                    $savj=Saveevent::where('user_id',$user_id)->select('ivent_id')->get();


          $applyevents=Applyevent::whereIn('id', $savj)->get();

return response(['msg'=>'Saved Events List','applyevents'=>$applyevents]);
    }


     public function appliedevent(Request $request)
    {
      // code for applied events
          $user_id = Auth()->user()->id;

                    $apli=Userevent::where('user_id',$user_id)->select('ivent_id')->get();


          $applyevents=Applyevent::whereIn('id', $apli)->get();
 return response(['msg'=>'Applied Events List','applyevents'=>$applyevents]);
   
    }



	    public function edit(Applyevent $applyevent)
	    {
	    	abort_if(Gate::denies('naukri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	     return response(['msg'=>'Code Not In Use']);
	    }


	    public function update(Request $request, Applyevent $applyevent)
	    {
	    return response(['msg'=>'Code Not In Use']);
	    
}

	    public function show(Applyevent $applyevent)
	    {
	    
	    	 
                $applyevent->increment('ev_view');
return response(['msg'=>'Show Event Full Detail','applyevents'=>$applyevent]);           

	    }



	    public function destroy(Applyevent $applyevent)
	    {
	    	abort_if(Gate::denies('naukri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    return response(['msg'=>'Code Not In Use']);
	    }

	 
	}
