<?php
namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIventRequest;

use App\Ivent;

use Gate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class iventApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('episode_access') , Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ivents = Ivent::all();

        return response(['msg'=>'all data','events'=>$ivents]);

       
    }

    public function eventmaster()
    {
        abort_if(Gate::denies('episode_access') , Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ivents = Ivent::latest()->get();

         return response(['msg'=>'only for admin event data','events'=>$ivents]);

       
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

               return response(['fetch city name'=>$response]);
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

                 return response(['step' =>2, 'Event'=>$ivent]);
           

            }
            elseif ($ivent->ev_step == 2)
            {

                $ivent = $ivent->id;
                return response(['step' =>3, 'Event'=>$ivent]);
           
                
            }

        }
        else
        {
            return response(['msg' => 'No Pending Ad Found', 'event' => $ivent]);
        }

    }

    public function createStep1(Request $request)
    {

        if (isset($request->ivent))
        {
            $asd = $request->get('ivent');
            $ivent = ivent::where('id', $asd)->first();
        


             return response(['data' =>$ivent, 'msg'=>'You back from Step2']);
        }
        else
        {

         

           return response(['data' =>'', 'msg'=>'Show Fields']);

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
                
                  return response(['data' =>$ivent, 'msg'=>'Data added go for step 2']);
                }

          
        else
        {
            $ivent = Ivent::where('id', $request['ivent'])->first();
            $ivent->update($request->all());

            $ivent = $request['ivent'];
        }

        return response(['data' =>$ivent, 'msg'=>'Data Updated go for step 2']);

    }

    public function createStep2(Ivent $ivent)
    {

   
    return response(['data' =>$ivent, 'msg'=>'Data Updated go for step 2']);

       
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

                     return response(['data' =>$ivent, 'msg'=>'Data posted go for step 3']);
        

    }

    public function createStep3(Ivent $ivent)
    {

       return response(['data' =>$ivent, 'msg'=>'create step 3 Review data']);  

       
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
     

     $datas = [

              'greeting' => 'Hi Admin',
            'title' => 'New Event '.$ivent['ev_title'].' Created',

            'body' => 'For Event Verification click on button',

            'module' => url(route('admin.events.verifymaster', $ivent['id'])),

            'actionText' => 'View Event',

            'actionURL' => url(route('admin.events.verifymaster', $ivent['id'])),

            'created_by_id' => $ivent['created_by_id']

        ];

        $user =User::first();
          
              $user->notify(new \App\Notifications\MySocialNotification($datas));

         return response(['data' =>$ads, 'msg'=>'Event Created  Successfully and Under Review']);  
       
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
       

return response(['For Admin event verify' =>$ivent]);  
     
    }

    public function evup(Request $request, Ivent $ivent)
    {
        
    // code for admin event verify
      
        $expiry_day = Carbon::now()->addDays($request['exp_date']);

$user_id = Auth()->user()->id;
        $ivent->update(['ev_status' => $request['ev_status'], 'ev_exp_date' => $expiry_day,'approved_by_id' => $user_id]);
        return response(['Event Verified Successfully ' =>$ivent]);  

       
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
        ivent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}