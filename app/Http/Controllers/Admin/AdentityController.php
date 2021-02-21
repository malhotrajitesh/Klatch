<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Adentity;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class adentityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_ent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adentitys = Adentity::all();

        return view('admin.adentitys.index', compact('adentitys'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_ent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adentitys.create');
    }

    public function store(Request $request)
    {
        $adentity = Adentity::create($request->all());

        return redirect()->route('admin.adentitys.index');
    }

    public function edit(Adentity $adentity)
    {
        abort_if(Gate::denies('job_ent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adentity->load('created_by');

        return view('admin.adentitys.edit', compact('adentity'));
    }

    public function update(Request $request, Adentity $adentity)
    {
        $adentity->update($request->all());

        return redirect()->route('admin.adentitys.index');
    }

    public function show(Adentity $adentity)
    {
        abort_if(Gate::denies('job_ent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adentity->load('created_by');

        return view('admin.adentitys.show', compact('adentity'));
    }

    public function destroy(Adentity $adentity)
    {
        abort_if(Gate::denies('job_ent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adentity->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        Adentity::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
