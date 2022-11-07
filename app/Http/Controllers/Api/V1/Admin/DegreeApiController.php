<?php

namespace App\Http\Controllers\Api\V1\Admin;
use App\Http\Controllers\Controller;

use App\Http\Requests\StoreDegreeRequest;
use App\Http\Requests\UpdateDegreeRequest;
use App\Degree;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DegreeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jobdegree_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degrees = Degree::all();

     return response(['degree'=>$degrees]);
    }

    public function create()
    {
        abort_if(Gate::denies('jobdegree_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      return response(['data'=>"not aloowd"]);
    }

    public function store(StoreDegreeRequest $request)
    {
        $degree = Degree::create($request->all());

      return  response(['data'=>$degree]);
    }

    public function edit(Degree $degree)
    {
        abort_if(Gate::denies('jobdegree_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->load('created_by');

     return   response(['data'=>$degree]);
    }

    public function update(UpdateDegreeRequest $request, Degree $degree)
    {
        $degree->update($request->all());

     return response(['data'=>$degree]);
    }

    public function show(Degree $degree)
    {
        abort_if(Gate::denies('jobdegree_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->load('created_by');

     return  response(['data'=>$degree]);
    }

    public function destroy(Degree $degree)
    {
        abort_if(Gate::denies('jobdegree_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $degree->delete();

     return  response(['data'=>$degree]);
    }

   
}
