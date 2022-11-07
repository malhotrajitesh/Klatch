<?php

namespace App\Http\Controllers\Admin;

use App\Dycat;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class dycatController extends Controller
{
    public function index(request $request)
    {
        abort_if(Gate::denies('dycat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $sat = $request['cat']; 
//print_r($sat);
//die("jol");
        $dycats = Dycat::where('cat_type', $sat)->withTrashed()->get();

        return view('admin.dycats.index', compact('dycats', 'sat'));
    }


  

    public function store(Request $request)
    {
      abort_if(Gate::denies('dycat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $validatedData = $request->validate(['dycat_name' => 'unique:dycat']);



                 Dycat::create($request->all());


        return redirect()->route('admin.dycats.index', ['cat' => $request->cat_type])->with('success','This Category 
                    '. $request['dycat_title'].' Added Successfully');
    }

    public function edit(Dycat $dycat)
    {
        abort_if(Gate::denies('dycat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dycat;

        return view('admin.dycats.edit', compact('dycat'));
    }

    public function update(Request $request, Dycat $dycat)
    {
        $validatedData = $request->validate(['dycat_title' => 'unique:dycat,cat_name,'.$dycat->id,]);

        $dycat->update($request->all());

        return redirect()->route('admin.dycats.index', ['cat' => $dycat->cat_type]);
    }

    public function show(Dycat $dycat)
    {
        abort_if(Gate::denies('dycat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dycat->load('created_by');

        return view('admin.dycats.show', compact('dycat'));
    }






    public function destroy(Dycat $dycat)
    {
        abort_if(Gate::denies('dycat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    

        $dycat->delete();

        return back();
    }


    public function massDestroy(Request $request)
    {


       Dycat::withTrashed()->whereIn('id', request('ids'))->restore();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
