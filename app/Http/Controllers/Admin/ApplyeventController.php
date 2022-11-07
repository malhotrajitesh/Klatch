<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	

	use App\Applyevent;
    use App\Userevent;
    use App\Saveevent;
	use Gate;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use Symfony\Component\HttpFoundation\Response;


	class ApplyeventController extends Controller
	{
		public function index()
		{
			abort_if(Gate::denies('naukri_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

			$applyevents = Applyevent::latest()->where('ev_status', '=', 'Approve')->get();;

			return view('admin.applyevents.index', compact('applyevents'));
		}

		


		public function create()
		{
			abort_if(Gate::denies('naukri_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
	/*
	      
	  */
	}

	 public function japply(Request $request)
	    {

           $user_id = Auth()->user()->id;
          $apply = Apply::where('user_id',$user_id)->first();
          if($apply)
          {
           $apsuc = Apply::create(['user_id' => $user_id,'job_id' => $request['jid']]);
           $jinc = Applyjob::where('id',$request['jid'])->first();

           $jinc->increment('jseeker');
           $jinc->increment('jview');
                $response = "applied";
                echo json_encode($response);
      exit;

          }
          else{

          	$profile = Profile::where('created_by_id',$user_id)->where('prog',100)->first();

          	if($profile)
          	  {
                
               $response = "first";  
      echo json_encode($response);
      exit;


          	  }
          	  else
          	  {
               return redirect()->route('admin.profiles.index')->with('success','First Complete Your Profile then Apply For Job');


          	  }
         



          }
	    	

	    	
	 //   $ad = $Applyjob;

	//     $ad->notify(new \App\Notifications\ToEmail( $ad ) );
	  //   Mail::to($Applyjob)->send($Applyjob);

	    	return redirect()->route('admin.applyjobs.index');
	    }

 public function joapply(Request $request)
	    {
	    	$user_id = Auth()->user()->id;
	    	   $apsuc = Apply::create(['user_id' => $user_id,'job_id' => $request['jid']]);
	    	   $jinc = Applyjob::where('id',$request['jid'])->first();

           $jinc->increment('jseeker');
           $jinc->increment('jview');
                $response = "applied";
                echo json_encode($response);
      exit;


	    }

 public function viewlist($ivent)
	    {


  $profiles=Userevent::leftjoin('profiles', 'user_ivent.user_id', '=', 'profiles.created_by_id')
                ->where('user_ivent.ivent_id', $ivent)->get();


      return view('admin.applyevents.viewlist', compact('profiles'));


	    }




 public function eintested(Request $request){

    $userId = Auth()->user()->id;



    $a_like = Userevent::withTrashed()->where('user_id',$userId)->where('ivent_id', '=', $request->ivent)->first();

    if (is_null($a_like)) {
        $interest = Userevent::create(['user_id' => $userId,'ivent_id' => $request->ivent]);
        Applyevent::where('id', '=', $request->ivent)->increment('ev_interest');
        $output = '1';
        echo $output;
    } else {
        if (is_null($a_like->deleted_at)) {
            $a_like->delete();
            Applyevent::where('id', '=', $request->ivent)->decrement('ev_interest');
            $output = '2';
            echo $output;
        } else {
            $a_like->restore();
           Applyevent::where('id', '=', $request->ivent)->increment('ev_interest');
            $output = '1';
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
        echo $output;
    } else {
        if (is_null($a_like->deleted_at)) {
            $a_like->delete();
            Applyevent::where('id', '=', $request->ivent)->decrement('ev_save');
            $output = '2';
            echo $output;
        } else {
            $a_like->restore();
           Applyevent::where('id', '=', $request->ivent)->increment('ev_save');
            $output = '1';
            echo $output;
        }
    }

}


	    public function store(Request $request)
	    {

// code active for intersetd person assiign

	    	$ads = Userevent::where('user_id',$request['uid'])->where('ivent_id',$request['eid'])->update(['status' => $request['status']]);

	    
	

	    	return back()->with('success','Successfuly Assign');
	    }


  public function getsaveevent(Request $request)
    {
       // active codde for saved evnts
          $user_id = Auth()->user()->id;

                    $savj=Saveevent::where('user_id',$user_id)->select('ivent_id')->get();


          $applyevents=Applyevent::whereIn('id', $savj)->get();


   
    
return view('admin.applyevents.savedevent', compact('applyevents'));
    }

     public function appliedevent(Request $request)
    {
      // code for applied events
          $user_id = Auth()->user()->id;

                    $apli=Userevent::where('user_id',$user_id)->select('ivent_id')->get();


          $applyevents=Applyevent::whereIn('id', $apli)->get();
 
   
    
return view('admin.applyevents.getevent', compact('applyevents'));
    }

	    public function edit(Applyjob $applyjob)
	    {
	    	abort_if(Gate::denies('naukri_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    	

	    	return view('admin.Applyjobs.edit', compact('applyjob_categories', 'applyjob'));
	    }

	    public function update(UpdateApplyjobRequest $request, Applyjob $applyjob)
	    {
	    	$Applyjob->update($request->all());

	    	return redirect()->route('admin.Applyjobs.index');
	    
}
	    public function show(Applyevent $applyevent)
	    {
	    
	    	
	    
                $applyevent->increment('ev_view');
           

	    

	    	return view('admin.applyevents.show', compact('applyevent'));
	    }

	    public function destroy(Applyjob $applyjob)
	    {
	    	abort_if(Gate::denies('naukri_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

	    	//$Applyjob->delete();

	    	return back();
	    }

	 
	}
