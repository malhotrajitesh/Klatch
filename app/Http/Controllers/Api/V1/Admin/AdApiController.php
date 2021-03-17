<?php

namespace App\Http\Controllers\Api\V1\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdRequest;
use App\Http\Resources\Admin\AdResource;
use App\Ad;
use App\Buy_ad;
use App\Pincode;
use App\Adcat;
use App\Adscat;
use Gate;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;



class AdApiController extends Controller
{
  public function index()
  {
           // abort_if(Gate::denies('data_access'), Response::HTTP_FORBIDDEN, '413 Forbidden');

    return new AdResource(Ad::with(['created_by','ad_cats','ad_scats'])->get());
  }


  public function soldad(Request $request)
  {


   $ads = Ad::where('id',$request->nad)->update(['ad_status' => 'Sold']);

   response(['data'=>$ads]);
 }


 public function adact(Request $request, Ad $ad)
 {


   $ads = Ad::where('id',$request['aid'])->update(['ad_status' => $request['astatus']]);

   return response(['data'=>$ads]);

 }



 public function fetch(Request $request)
 {

  $input = $request->get('id');

  $data= Adscat::select('id','name')->where('ad_cat_id',$input)->get();


  return  response(['data'=>$data]);


}


      function fadtitle(Request $request)
    {

    
     //   $search = $request->search;

   //   if($request->get('search')){
      //  $search = $request->get('search');



    //    $employees = Ad::select('adti')->where('adti', 'like', '%' .$search . '%')->limit(5)->groupBy('adti')->orderby('adti','asc')->get();
      $employees = Buy_ad::select('adti')->groupBy('adti')->orderby('adti','asc')->get();
     

        $response = array();
        foreach($employees as $employee){
        

          $response[] = array("value"=>'8',"label"=>$employee->adti);
        }
        return  $response;
      
          //    }
    }


     public function fetchpincode(Request $request)
    {

    $search = $request->search;

      if($request->get('search')){
        $search = $request->get('search');
         $employees = Pincode::orderby('pincode','desc')->select('pincode','area','region','city')->where('pincode', 'like', '%' .$search . '%')->limit(5)->get();
    // $employees = Pincode::orderby('pincode','desc')->select('pincode','area','region','city')->get();

   return  response(['data' =>$employees]);
     
  }
   }




public function pendapp(Request $request)
{

 $userId = Auth::user()->id;
 $ad = Ad::where('created_by_id',$userId)->where('ad_status', '=', 'UNFINISHED')->first();
 if($ad)
 {

  if($ad->step==1)
  {

    $ad=$ad->id;
    return response(['step' =>2, 'ad'=>$ad]);

  }
  elseif($ad->step==2) {

    $ad=$ad->id;
    return response(['step' =>3, 'ad'=>$ad]);
  }
  elseif($ad->step==3) {
   $ad=$ad->id;
   return response(['step' =>4, 'ad'=>$ad]);
 } 
 elseif($ad->step==4) {
   $ad=$ad->id;
   return response(['step' =>5, 'ad'=>$ad]);
 } 

}
else{
  return response(['msg' =>'No Pending Ad Found', 'ad'=>$ad]);
}

}



public function createStep1(Request $request)
{

 if(isset($request->ad)) {
   $asd = $request->get('ad');
   $ad = Ad::where('id',$asd)->first();
   $ad->load('ad_cats','ad_scats');

   $adscat_categories = Adcat::select('id','name')->get(); 
   
   return response(['category' =>$adscat_categories, 'ad'=>$ad]);
 }

 else
 {

   $adscat_categories = Adcat::select('id','name')->get(); 
   
   return response(['category' =>$adscat_categories]);
 }

}


public function postCreateStep1(Request $request)
{

  $validatedData = $request->validate([

    'ad_cat_id' => 'required',
    'ad_scat_id' => 'required',
    'step' =>'required',
    'ad_status' =>'required'

  ]);
  if(!isset($request->nid)) {


    $userId = Auth::user()->id;
    $validatedData['created_by_id'] = $userId;

    $ads = Ad::create($validatedData);

    $ad = $ads->id;
  }
  else{
    $ad = Ad::where('id',$request['nid'])->first();
    $ad->update($validatedData);

    $ad = $request['nid'];
  }  

  return response(['ad'=>$ad]);

}


public function createStep2(Ad  $ad)
{



 return response(['ad'=>$ad]);
}


public function postCreateStep2(Request $request)
{

  $validatedData = $request->validate([
    'adti' => 'required',
    'adtd' => 'required',
    'ad_city' => 'required',
    'ad_pincode' => 'required',
    'longitude' => 'required',
    'latitude' => 'required',
    'step'  => 'required',
    'ad_state'  => 'required',
    'ad_status'  => 'required'


  ]);


  $ads = Ad::where('id',$request['nid'])->first();

  $ads->increment('astep');
  if($ads->astep == 1)
  {
   $ads->increment('adprog',20);

 }
 $ads->update($validatedData);

 $ad =$request['nid'];


 return response(['ad'=>$ad]);


}

public function createStep3(Ad  $ad)
{



 return response(['ad'=>$ad]);
}


public function postCreateStep3(Request $request)
{

  $validatedData = $request->validate([

    'ad_type' => 'required',
    'step'  => 'required',
    'qty'  => 'required',
    'ad_price'  => 'required',
    'ad_status'  => 'required'


  ]);

  $ads = Ad::where('id',$request['nid'])->first();


  $ads->increment('bstep');
  if($ads->bstep == 1)
  {
   $ads->increment('adprog',20);

 }
 $ads->update($validatedData);

 $ad =$request['nid'];


 return response(['ad'=>$ad]);


}

public function createStep4(Ad $ad)
{


  return response(['ad'=>$ad]);
}


public function postCreateStep4(Request $request)
{


 $validatedData = $request->validate(['ad_pic' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 'ad_picb' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048','ad_picc' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048','ad_picd' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048','ad_pice' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 'step' => 'required', 'ad_status' => 'required']);


 if ($request->testn == '' && $request->ad_pic ==''){

   $request->validate([ 'ad_pic' => 'required']);
   return back()->witherror('First Image select field is required');

 }
 else{


  $uid= auth()->user()->id;

  $files1 = $request->input('ad_pic');
  $files2 = $request->input('ad_picb');
  $files3 = $request->input('ad_picc');
  $files4 = $request->input('ad_picd');
  $files5 = $request->input('ad_pice');
  $destinationPath = 'public/image/uvaad/';

  if (isset($files1))
  {
   $fileName1 = $uid."-a-ad-" . time() . '.' . $request->ad_pic->getClientOriginalExtension();

   $files1->move($destinationPath, $fileName1);
   $validatedData['ad_pic'] = $fileName1;

 }

 if (isset($files2))
 {
   $fileName2 = $uid."-b-ad-" . time() . '.' . $request->ad_picb->getClientOriginalExtension();

   $files2->move($destinationPath, $fileName2);
   $validatedData['ad_picb'] = $fileName2;

 }
 if (isset($files3))
 {
   $fileName3 = $uid."-c-ad-" . time() . '.' . $request->ad_picc->getClientOriginalExtension();

   $files3->move($destinationPath, $fileName3);
   $validatedData['ad_picc'] = $fileName3;

 }
 if (isset($files4))
 {
   $fileName4 = $uid."-d-ad-" . time() . '.' . $request->ad_picd->getClientOriginalExtension();

   $files4->move($destinationPath, $fileName4);
   $validatedData['ad_picd'] = $fileName4;

 }
 if (isset($files5))
 {
   $fileName5 = $uid."-e-ad-" . time() . '.' . $request->ad_pice->getClientOriginalExtension();

   $files5->move($destinationPath, $fileName5);
   $validatedData['ad_pice'] = $fileName5;

 }



 $ad = Ad::where('id', $request['nid'])->first();

 $ad->increment('cstep');
 if($ad->cstep == 1)
 {
   $ad->increment('adprog',20);

 }

 $ad->update($validatedData);

 $ad =  $request['nid'];

 return response(['ad'=>$ad]);
}

}


public function createStep5(Ad  $ad)
{

 $ad->load('ad_cats','ad_scats');

 return response(['ad'=>$ad]);
}


public function show(Ad $ad)
{
  $ad->increment('aview');
  $ad->load('ad_cats','ad_scats','created_by');

  return response(['view'=>$ad]);
        //
}

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {

         $ads = Ad::where('id',$request['nid'])->update(['ad_status' => $request['ad_status'], 'step' => $request['step']]);
         
         return (new AdResource($ad))
         ->response()
         ->setStatusCode(Response::HTTP_ACCEPTED);
       }

     }
