<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIventRequest;

use App\Ivent;
use App\User;
use App\Traits\WebmeTrait;
use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class iventController extends Controller
{

     use  WebmeTrait;

    public function index()
    {
        abort_if(Gate::denies('episode_access') , Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ivents = Ivent::all();

        return view('admin.events.index', compact('ivents'));
    }

    public function eventmaster()
    {
        abort_if(Gate::denies('episode_access') , Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ivents = Ivent::latest()->simplePaginate(100);

        return view('admin.events.master', compact('ivents'));
    }

    function fetchcity(Request $request)
    {
        // code for prouct name
      if($request->get('term'))
                $search = $request->search;

            if($request->get('search')){
                $search = $request->get('search');



                $employees = DB::table('ivents')->select('ev_city')->where('ev_city', 'like', '%' .$search . '%')->groupBy('ev_city')->limit(5)->orderby('ev_city','asc')->get();

                $response = array();
                foreach($employees as $employee){
                

                    $response[] = array("value"=>'8',"label"=>$employee->ev_city);
                }

                echo json_encode($response);
                exit;
            }
        }

    public function create()
    {
        abort_if(Gate::denies('episode_create') , Response::HTTP_FORBIDDEN, '403 Forbidden');
    
    }

    public function pendevent(Request $request)
    {

        $gol = $request->nivent;

        // $userId = Auth::user()->id;
        $ivent = ivent::where('id', $gol)->where('ev_status', '=', 'UNFINISHED')
            ->first();
        if ($ivent)
        {

            if ($ivent->ev_step == 1)
            {

                $ivent = $ivent->id;
                return redirect()
                    ->route('admin.events.create-step2', $ivent);

            }
            elseif ($ivent->ev_step == 2)
            {

                $ivent = $ivent->id;
                return redirect()
                    ->route('admin.events.create-step3', $ivent);
            }

        }
        else
        {
            return response(['msg' => 'No Pending Ad Found', 'ad' => $ivent]);
        }

    }

    public function createStep1(Request $request)
    {

        if (isset($request->ivent))
        {
            $asd = $request->get('ivent');
            $ivent = ivent::where('id', $asd)->first();
        


            return view('admin.events.create-step1', compact('ivent'));
        }
        else
        {

         

            return view('admin.events.create-step1');

        }

    }

    public function postCreateStep1(Request $request)
    {

    	
        $validatedData = $request->validate([

        'ev_step' => 'required', 'ev_status' => 'required'

        ]);

        if (!isset($request->ivent))

        {

      
                            $ivent = Ivent::create($request->all());

                    $ivent = $ivent->id;
                    return redirect()
                        ->route('admin.events.create-step2', $ivent);

                }

          
        else
        {
            $ivent = ivent::where('id', $request['ivent'])->first();
            $ivent->update($request->all());

            $ivent = $request['ivent'];
        }

        return redirect()->route('admin.events.create-step2', $ivent);

    }

    public function createStep2(Ivent $ivent)
    {

   

        return view('admin.events.create-step2', compact('ivent'));
    }

    public function postCreateStep2(Request $request, Ivent $ivent)
    {


        $validatedData = $request->validate(['ev_by' => 'required', 'ev_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 'ev_step' => 'required', 'ev_status' => 'required']);
        $uid= auth()->user()->id;

                    $files = $request->file('ev_pic');
                   
                    if (isset($files))
                    {

                      
                        $destinationPath = 'public/image/uvaevent';
                   
                        $fileName = $uid."event-" . time() . '.' . $request->ev_pic->getClientOriginalExtension();
                          
                            
                      
                        $files->move($destinationPath, $fileName);

                         $validatedData['ev_pic'] = $fileName;

                          $ivent = Ivent::where('id', $request['ivent_id'])->first();
        $ivent->update($validatedData);
                
                    }
                    else
                    {

                           $ivent = Ivent::where('id', $request['ivent_id'])->first();
        $ivent->update($validatedData);
                        
                    }

                    
                  
      

        // $ivent =$request['ivent_id'];
        

        return redirect()
            ->route('admin.events.create-step3', $ivent);

    }

    public function createStep3(Ivent $ivent)
    {

        

        return view('admin.events.create-step3', compact('ivent'));
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

        $ads = ivent::where('id', $request['nid'])->update(['ev_status' => $request['ev_status'], 'ip' => $ip, 'ev_step' => $request['ev_step']]);

        $ivent = ivent::find($request['nid']);


                  $uid=$ivent['created_by_id'];
              $fdata = $ivent['ev_title'];
              $a_admin=1;
              $mf='store';
          $mc='Event';
               
                  $this->notidata($uid,$fdata,$a_admin,$mf,$mc);

        return redirect()->route('admin.events.index')->withSuccess('Event Created  Successfully and Under Review'); 
    }

    public function edit(Request $request, Ivent $ivent)
    {
    	// Not in use
        //abort_if(Gate::denies('episode_edit') , Response::HTTP_FORBIDDEN, '403 Forbidden');


      return view('admin.events.edit', compact('ivent'));
    }

      public function verifymaster(Ivent $ivent)
    {
    	// code for admin event master

               $uid=$ivent->created_by_id;
              $fdata = $ivent->ev_title;
              $a_admin=0;
              $mf='process';
              $mc='Event';
       $this->notidata($uid,$fdata,$a_admin,$mf,$mc);

      return view('admin.events.edit', compact('ivent'));
    }

    public function evup(Request $request, Ivent $ivent)
    {
        
    // code for admin event verify
      
        $expiry_day = Carbon::now()->addDays($request['exp_date']);

$user_id = Auth()->user()->id;


               $uid=$ivent['created_by_id'];
              $fdata = $ivent['ev_title'] .' is '. $request['ev_status'];
              $a_admin=0;
              $mf='verify';
              $mc='Event';
               
                  $this->notidata($uid,$fdata,$a_admin,$mf,$mc);

        $ivent->update(['ev_status' => $request['ev_status'], 'ev_exp_date' => $expiry_day,'approved_by_id' => $user_id]);



        return redirect()->route('admin.events.eventmaster')->withSuccess('Event Verified Successfully '); 
    }

    public function update(Request $request, Ivent $ivent)
    {
        
    
    
    }

    public function show(Ivent $ivent)
    {
        abort_if(Gate::denies('episode_show') , Response::HTTP_FORBIDDEN, '403 Forbidden');

    

        return view('admin.ivents.show', compact('ivent'));
    }

     public function closeevent(Request $request)
    {

   
       $ads = ivent::where('id',$request->nivent)->update(['ev_status' => 'CLOSED']);

        return back();
    }


    public function destroy(ivent $ivent)
    {
        abort_if(Gate::denies('episode_delete') , Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ivent->delete();

        return back();
    }

    public function massDestroy(MassDestroyiventRequest $request)
    {
        Ivent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}