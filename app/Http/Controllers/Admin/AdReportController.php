<?php
namespace App\Http\Controllers\Admin;

use App\Ad;
use App\Http\Controllers\Controller;

use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdReportController extends Controller
{
    public function index()
    {
      
       abort_if(Gate::denies('adreport_access') , Response::HTTP_FORBIDDEN, '403 Forbidden');
      $ads = Ad::latest()->simplePaginate(100);
  

        return view('admin.adreports.index', compact(
            'ads'
        ));
    }

   public function edit(Ad $ad)
    {
         abort_if(Gate::denies('adreport_access') , Response::HTTP_FORBIDDEN, '403 Forbidden');
    	 $ad->load('ad_cats','ad_scats','created_by');
      return view('admin.adreports.edit', compact('ad'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {

 abort_if(Gate::denies('adreport_access') , Response::HTTP_FORBIDDEN, '403 Forbidden');
$start_day = Carbon::now()->format('Y-m-d 00:00:00'); //get a carbon instance with created_at as date
$expiry_day = $start_day->addDays($request['exp_date']); 

$ad->update(['ad_status' => $request['ad_status'], 'exp_date' => $expiry_day]);
     return redirect()->route('admin.adreports.index')->withSuccess('Ad Verified Successfully ');


        //
    }


}
