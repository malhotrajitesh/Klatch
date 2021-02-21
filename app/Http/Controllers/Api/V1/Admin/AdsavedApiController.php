<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;

use App\Adsaved;
use App\Buy_ad;
use Gate;
use Illuminate\Http\Request;
use App\Http\Resources\Admin\AdscatResource;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdsavedApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('my_save_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

     
 return new AdscatResource(Adsaved::with(['created_by'])->get());

    }

    public function create()
    {
       
    }

  


 public function adsave(Request $request){

    $userId = Auth::user()->id;



    $a_like = ADsaved::withTrashed()->where('created_by_id',$userId)->where('ad_id', '=', $request->ad)->first();

    if (is_null($a_like)) {
        $Adsaved = Adsaved::create(['created_by_id' => $userId,'ad_id' => $request->ad]);
        Buy_ad::where('id', '=', $request->ad)->increment('asaved');
        $output = '1';
        return response(['data'=>$output]);
    } else {
        if (is_null($a_like->deleted_at)) {
            $a_like->delete();
            Buy_ad::where('id', '=', $request->ad)->decrement('asaved');
            $output = '2';
           return response(['data'=>$output]);
        } else {
            $a_like->restore();
           Buy_ad::where('id', '=', $request->ad)->increment('asaved');
            $output = '1';
          return response(['data'=>$output]);
        }
    }

}

public function store(Request $request)
{




    return response(['store'=>'store Wrong Path']);
}

public function edit(Adsaved $adsaved)
{
      //  abort_if(Gate::denies('my_save_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    return response(['edit'=>' Wrong Path']);
}

public function update(Request $request, Adsaved $adsaved)
{
    return response(['edit'=>' Wrong Path']);
}

public function show(Adsaved $adsaved)
{
    abort_if(Gate::denies('my_save_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

     return response(['edit'=>' Wrong Path']);
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
