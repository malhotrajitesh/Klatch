<?php

namespace App\Http\Controllers\Api\V1\Admin;



use App\Http\Controllers\Controller;

use App\Buy_ad;
use Carbon\Carbon;
use App\Http\Resources\Admin\AdscatResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;

class BuyAdApiController extends Controller
{
    public function index(Request $request)
    {
      

      /// $adscat_categories = Adcat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
    //  $ads = Buy_ad::latest()->filter($request->except(['_token']))->with('ad_cats','ad_scats','created_by')->where('ad_status', '=', 'Approve')->get();
  
 return new AdscatResource(Buy_ad::latest()->filter($request->except(['_token']))->with('ad_cats','ad_scats','created_by')->where('ad_status', '=', 'Approve')->get());
     
    }

   public function edit(Buy_ad $buy_ad)
    {

    	 $buy_ad->load('ad_cats','ad_scats','created_by');
      return view('admin.buyads.edit', compact('ad'));
        //
    }


   public function show(Buy_ad $buy_ad)
    {

//$buy_ad->increment('aview');
         $buy_ad->load('ad_cats','ad_scats','created_by');
      return view('admin.buyads.show', compact('buy_ad'));

        //

    }



    public function update(Request $request, Buy_ad $buy_ad)
    {


$start_day = Carbon::now()->format('Y-m-d 00:00:00'); //get a carbon instance with created_at as date
$expiry_day = $start_day->addDays($request['exp_date']); 

$ad->update(['ad_status' => $request['ad_status'], 'exp_date' => $expiry_day]);
     return redirect()->route('admin.buyads.index')->withSuccess('Ad Verified Successfully ');


        //
    }


}
