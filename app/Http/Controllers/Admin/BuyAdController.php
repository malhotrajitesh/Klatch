<?php

namespace App\Http\Controllers\Admin;

use App\Buy_ad;
use App\Adcat;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use eloquentFilter\QueryFilter\ModelFilters\ModelFilters;

class BuyAdController extends Controller
{
    public function index(Request $request)
    {
      
  //    $ads = Buy_ad::latest()->filter($request->except(['_token']))->with('ad_cats','ad_scats','created_by')->where('ad_status', '=', 'Approve')->get();
//print_r($request->all());
//die("jol");
                      $tops = DB::table('ad')->where('ad_status', '=', 'Approve')->orderBy(DB::raw("'aview' + 'asaved'"), 'desc')->limit(5)->get();
                     
       $adscat_categories = Adcat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
      $buy_ads = Buy_ad::latest()->filter($request->except(['_token']))->with('ad_cats','ad_scats','created_by')->where('ad_status', '=', 'Approve')->get();
  

        return view('admin.buyads.index', compact(
            'buy_ads','adscat_categories','tops'
        ));
    }

   public function edit(Buy_ad $buy_ad)
    {

    	 $buy_ad->load('ad_cats','ad_scats','created_by');
      return view('admin.buyads.edit', compact('ad'));
        //
    }


   public function adetail(Request $request, Buy_ad $buy_ad)
    {


 $buy_ad = Buy_ad::where('id',$request->aid)->first();



        $buy_ad->increment('aview');
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
