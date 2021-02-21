<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDegreeRequest;
use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;
use App\Degree;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DegreeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jobdegree_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degrees = Degree::all();

        return view('admin.degrees.index', compact('degrees'));
    }

    public function create()
    {
        abort_if(Gate::denies('jobdegree_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.degrees.create');
    }

    public function store(StoreDegreeRequest $request)
    {
        $degree = Degree::create($request->all());

        return redirect()->route('admin.degrees.index');
    }

    public function edit(Degree $degree)
    {
        abort_if(Gate::denies('jobdegree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->load('created_by');

        return view('admin.degrees.edit', compact('degree'));
    }

    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        $degree->update($request->all());

        return redirect()->route('admin.degrees.index');
    }

    public function show(Degree $degree)
    {
        abort_if(Gate::denies('jobdegree_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->load('created_by');

        return view('admin.degrees.show', compact('degree'));
    }

    public function destroy(Degree $degree)
    {
        abort_if(Gate::denies('jobdegree_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->delete();

        return back();
    }

    public function massDestroy(MassDestroyDegreeRequest $request)
    {
        Degree::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
