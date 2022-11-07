<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Events\AdLiked;
use App\Adsaved;
use App\Buy_ad;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdsavedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('my_save_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $Adsaveds = Adsaved::all();

        return view('admin.adsaveds.index', compact('Adsaveds'));
    }

    public function create()
    {
       // abort_if(Gate::denies('my_save_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.Adsaveds.create');
    }

    public function codenotuse(){
        $adsaved = ADsaved::where('created_by_id',$userId)->where('ad_id', '=', $request->ad)->first();

        if($adsaved){
            $adsaved->delete();
           Buy_ad::where('id', '=', $request->ad)->decrement('asaved');
            $output = '2';
            echo $output;

        }
        else{
         $Adsaved = Adsaved::create(['created_by_id' => $userId,'ad_id' => $request->ad]);
         Buy_ad::where('id', '=', $request->ad)->increment('asaved');
         $output = '1';
         echo $output;
     }
 }


 public function adsave(Request $request){

    $userId = Auth::user()->id;



    $adsaved = ADsaved::withTrashed()->where('created_by_id',$userId)->where('ad_id', '=', $request->ad)->first();

    if (is_null($adsaved)) {
        $adsaved = Adsaved::create(['created_by_id' => $userId,'ad_id' => $request->ad]);
        Buy_ad::where('id', '=', $request->ad)->increment('asaved');
        $output = '1';
        echo $output;
     
    } else {
        if (is_null($adsaved->deleted_at)) {
             
            $adsaved->delete();
            Buy_ad::where('id', '=', $request->ad)->decrement('asaved');
            $output = '2';
            echo $output;
        } else {
            $adsaved->restore();
           Buy_ad::where('id', '=', $request->ad)->increment('asaved');
            $output = '1';
            echo $output;
        }
    }

}

public function store(Request $request)
{




    return redirect()->route('admin.Adsaveds.index');
}

public function edit(Adsaved $adsaved)
{
      //  abort_if(Gate::denies('my_save_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $adsaved->load('created_by');

    return view('admin.Adsaveds.edit', compact('Adsaved'));
}

public function update(Request $request, Adsaved $adsaved)
{
    $adsaved->update($request->all());

    return redirect()->route('admin.Adsaveds.index');
}

public function show(Adsaved $adsaved)
{
    abort_if(Gate::denies('my_save_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $adsaved->load('created_by');

    return view('admin.Adsaveds.show', compact('adsaved'));
}

public function destroy(Adsaved $adsaved)
{
    abort_if(Gate::denies('my_save_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $adsaved->delete();

    return back();
}

public function massDestroy(MassDestroyAdsavedRequest $request)
{
    Adsaved::whereIn('id', request('ids'))->delete();

    return response(null, Response::HTTP_NO_CONTENT);
}
}
