<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdscatRequest;
use App\Http\Requests\StoreAdscatRequest;
use App\Http\Requests\UpdateAdscatRequest;
use App\Adscat;
use App\Adcat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdscatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sub_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adscats = Adscat::withTrashed()->get();

        return view('admin.adscats.index', compact('adscats'));
    }

    public function create()
    {
        abort_if(Gate::denies('sub_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adscat_categories = Adcat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.adscats.create', compact('adscat_categories'));
    }

    public function store(StoreAdscatRequest $request)
    {
          $valx=  Adscat::where([
                       ['ad_cat_id', $request->ad_cat_id],
                       ['name', $request->name]
                 ])->first();
        if($valx)
        {
         return back()->with('error','This Sub Category 
                    '. $request['name'].' Already Added');   
        }

        $adscat = Adscat::create($request->all());

        return redirect()->route('admin.adscats.index')->with('success','This Sub Category 
                    '. $request['name'].' Added Successfully');
    }


            function scname(Request $request)
        {
    // code for prouct name
            if($request->get('term'))
                $search = $request->search;

            if($request->get('search')){
                $search = $request->get('search');



                $employees = Adscat::select('name')->where('name', 'like', '%'.$search.'%')->limit(5)->groupBy('name')->orderby('name','asc')->get();
                $response = array();
                foreach($employees as $employee){
                

                    $response[] = array("value"=>'8',"label"=>$employee->name);
                }

                echo json_encode($response);
                exit;
            }
        }


    public function edit(Adscat $adscat)
    {
        abort_if(Gate::denies('sub_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adscat_categories = Adcat::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $adscat->load('ad_cats', 'created_by');

        return view('admin.adscats.edit', compact('adscat_categories', 'adscat'));
    }

    public function update(UpdateAdscatRequest $request, Adscat $adscat)
    {
        $adscat->update($request->all());

        return redirect()->route('admin.adscats.index');
    }

    public function show(Adscat $adscat)
    {
        abort_if(Gate::denies('sub_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adscat->load('ad_cats', 'created_by');

        return view('admin.adscats.show', compact('adscat'));
    }

    public function destroy(Adscat $adscat)
    {
        abort_if(Gate::denies('sub_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adscat->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdscatRequest $request)
    {
        Adscat::withTrashed()->whereIn('id', request('ids'))->restore();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
