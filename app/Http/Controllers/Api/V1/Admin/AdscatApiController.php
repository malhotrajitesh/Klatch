<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdscatRequest;
use App\Http\Requests\StoreAdscatRequest;
use App\Http\Requests\UpdateAdscatRequest;
use App\Http\Resources\Admin\AdscatResource;
use App\Adscat;
use App\Adcat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdscatApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sub_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

   
        return new AdscatResource(Adscat::with(['ad_cats', 'created_by'])->get());

    }

    public function create()
    {
        abort_if(Gate::denies('sub_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adscat_categories = Adcat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return  $adscat_categories;
    }

    public function store(StoreAdscatRequest $request)
    {
        $adscat = Adscat::create($request->all());

        return (new AdscatResource($adscat))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function edit(Adscat $adscat)
    {
        abort_if(Gate::denies('sub_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adscat_categories = Adcat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $adscat->load('ad_cats', 'created_by');
   return response(['data'=>$adscat, 'category'=>$adscat_categories]);
           
           
        
    }

    public function update(UpdateAdscatRequest $request, Adscat $adscat)
    {
        $adscat->update($request->all());

        return (new AdscatResource($adscat))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function show(Adscat $adscat)
    {
        abort_if(Gate::denies('sub_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adscat->load('ad_cats', 'created_by');

       return new AdscatResource($adscat->load(['ad_cats', 'created_by']));
    }

    public function destroy(Adscat $adscat)
    {
        abort_if(Gate::denies('sub_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adscat->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdscatRequest $request)
    {
        Adscat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
