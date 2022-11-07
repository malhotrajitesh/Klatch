<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySkillRequest;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Skill;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class skillController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('utalent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skills = Skill::all();

        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        abort_if(Gate::denies('utalent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.skills.create');
    }

    public function store(StoreSkillRequest $request)
    {
        $skill = Skill::create($request->all());
        return back()->withSuccess(['Skill'. $request['name'].' Added Successfully']);

       // return redirect()->route('admin.skills.index');
    }

    public function edit(Skill $skill)
    {
        abort_if(Gate::denies('utalent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skill->load('created_by');

        return view('admin.Skills.edit', compact('skill'));
    }

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $skill->update($request->all());

        return redirect()->route('admin.skills.index');
    }

    public function show(Skill $skill)
    {
        abort_if(Gate::denies('utalent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skill->load('created_by');

        return view('admin.skills.show', compact('skill'));
    }

    public function destroy(Skill $skill)
    {
        abort_if(Gate::denies('utalent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skill->delete();

        return back();
    }

    public function massDestroy(MassDestroySkillRequest $request)
    {
        Skill::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
