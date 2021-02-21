<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Cbranch;
use App\Http\Requests\StoreCbranchRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CbranchController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bc_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cbranchs = Cbranch::all();

        return view('admin.cbranchs.index', compact('cbranchs'));
    }

    public function create()
    {
        abort_if(Gate::denies('bc_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

   

        return view('admin.cbranchs.create');
    }

    public function store(StoreCbranchRequest $request)
    {
        $cbranch = Cbranch::create($request->all());

        return redirect()->route('admin.cbranchs.index');
    }

    public function edit(Cbranch $cbranch)
    {
        abort_if(Gate::denies('bc_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

     

        $cbranch->load('created_by');

        return view('admin.cbranchs.edit', compact('cbranch'));
    }

    public function update(Request $request, Cbranch $cbranch)
    {
        $cbranch->update($request->all());

        return redirect()->route('admin.cbranchs.index');
    }

    public function show(Cbranch $cbranch)
    {
        abort_if(Gate::denies('bc_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cbranch->load('created_by');

        return view('admin.cbranchs.show', compact('cbranch'));
    }

    public function destroy(Cbranch $cbranch)
    {
        abort_if(Gate::denies('bc_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cbranch->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Cbranch::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
