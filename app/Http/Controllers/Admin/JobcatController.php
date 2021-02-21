<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyJobcatRequest;
use App\Http\Requests\StoreJobcatRequest;
use App\Http\Requests\UpdateJobcatRequest;
use App\Jobcat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JobcatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('job_cat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobcats = Jobcat::all();

        return view('admin.jobcats.index', compact('jobcats'));
    }

    public function create()
    {
        abort_if(Gate::denies('job_cat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.jobcats.create');
    }

    public function store(StoreJobcatRequest $request)
    {
        $jobcat = Jobcat::create($request->all());

        return redirect()->route('admin.jobcats.index');
    }

    public function edit(Jobcat $jobcat)
    {
        abort_if(Gate::denies('job_cat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobcat->load('created_by');

        return view('admin.jobcats.edit', compact('jobcat'));
    }

    public function update(UpdateJobcatRequest $request, Jobcat $jobcat)
    {
        $jobcat->update($request->all());

        return redirect()->route('admin.jobcats.index');
    }

    public function show(Jobcat $jobcat)
    {
        abort_if(Gate::denies('job_cat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobcat->load('created_by');

        return view('admin.jobcats.show', compact('jobcat'));
    }

    public function destroy(Jobcat $jobcat)
    {
        abort_if(Gate::denies('job_cat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jobcat->delete();

        return back();
    }

    public function massDestroy(MassDestroyJobcatRequest $request)
    {
        Jobcat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
