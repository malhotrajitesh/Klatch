<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdcatRequest;
use App\Http\Requests\StoreAdcatRequest;
use App\Http\Requests\UpdateAdcatRequest;
use App\Http\Resources\Admin\AdcatResource;
use App\Adcat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdcatApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('a_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adcats = Adcat::all();

       return new AdcatResource(Adcat::get());
    }

    public function create()
    {
   
    }

    public function store(StoreAdcatRequest $request)
    {
        $adcat = Adcat::create($request->all());

           return (new AdcatResource($adcat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
  

    }

    public function edit(Adcat $adcat)
    {
        abort_if(Gate::denies('a_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adcat->load('created_by');

        return $adcat;
    }

    public function update(UpdateAdcatRequest $request, Adcat $adcat)
    {
        $adcat->update($request->all());

         return (new AdcatResource($adcat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function show(Adcat $adcat)
    {
        abort_if(Gate::denies('a_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


       return new AdcatResource($adcat->load(['created_by']));
    }

 

    public function massDestroy(MassDestroyAdcatRequest $request)
    {
        Adcat::whereIn('id', request('ids'))->delete();


        return response(null, Response::HTTP_NO_CONTENT);
    }
}
