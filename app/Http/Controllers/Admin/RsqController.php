<?php
namespace App\Http\Controllers\Admin;

use App\Rsq;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RsqController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('rsq_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rsqs = Rsq::withTrashed()->get();

        return view('admin.rsqs.index', compact('rsqs'));
    }



    public function create()
    {
        abort_if(Gate::denies('rsq_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.rsqs.create');
    }

    public function store(Request $request)
    {
      //  $validatedData = $request->validate(['rsq_name' => 'unique:rsqs']);



                 Rsq::create($request->all());


        return redirect()->route('admin.rsqs.index')->with('success','This Question 
                    '. $request['rsq_name'].' Added Successfully');
    }

    public function edit(Rsq $rsq)
    {
        abort_if(Gate::denies('rsq_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rsq;

        return view('admin.rsqs.edit', compact('rsq'));
    }

    public function update(Request $request, Rsq $rsq)
    {
      //  $validatedData = $request->validate(['rsq_name' => 'unique:rsqs,rsq_name,'.$rsq->id,]);

        $rsq->update($request->all());

        return redirect()->route('admin.rsqs.index');
    }

    public function show(Rsq $rsq)
    {
        abort_if(Gate::denies('rsq_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rsq;

        return view('admin.rsqs.show', compact('rsq'));
    }



    public function destroy(Rsq $rsq)
    {
        abort_if(Gate::denies('rsq_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    

        $rsq->delete();

        return back();
    }


    public function massDestroy(Request $request)
    {


       Rsq::withTrashed()->whereIn('id', request('ids'))->restore();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
