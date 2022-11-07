<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExperianceRequest;
use App\Http\Requests\StoreExperianceRequest;
use App\Http\Requests\UpdateExperianceRequest;
use App\Experiance;
use App\Profile;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ExperianceApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('uwork_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experiances = Experiance::all();
        return  response(['experiance'=>$experiances]);

       
    }

    public function create()
    {
        abort_if(Gate::denies('uwork_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


    }


    public function store(StoreExperianceRequest $request)
    {
        
            Experiance::create($request->all());

$user_id = Auth()->user()->id;
              $profile = Profile::where('created_by_id',$user_id)->first();
             
      $profile->increment('cwork');
      if($profile->cwork == 1)
      {
     $profile->increment('prog',25);

      }

return  response(['experiance'=>'This Experiance'. $request['exp_type'].' Added Successfully']);
           
      

       
    }

    public function edit(Experiance $experiance)
    {
        abort_if(Gate::denies('uwork_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experiance->load('created_by');

         return  response(['Edit Experiance'=>$experiance]);
    }

    public function update(Request $request, Experiance $experiance)
    {
        $experiance->update($request->all());

        
         return  response(['Updated'=>'Your Experiance'. $request['exp_type'].' Updated Successfully']);

       
    }

    public function show(Experiance $experiance)
    {
        abort_if(Gate::denies('uwork_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experiance->load('created_by');

        
        return  response(['Show Experiance'=>$experiance]);
    }

    public function destroy(Experiance $experiance)
    {
       // abort_if(Gate::denies('uwork_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $experiance->delete();
             $user_id = Auth()->user()->id;

        $profile = Profile::where('created_by_id',$user_id)->first();

         if($profile->cwork == 1)
      {
     $profile->decrement('prog',25);

      }
         if($profile->cwork != 0)
      {
      $profile->decrement('cwork');
    }
     
return  response(['Deleted'=>'Successfully']);
    }

    public function massDestroy(MassDestroyExperianceRequest $request)
    {
        Experiance::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
