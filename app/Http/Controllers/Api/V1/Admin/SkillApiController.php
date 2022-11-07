<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySkillRequest;
use App\Http\Requests\StoreSkillRequest;
use App\Http\Requests\UpdateSkillRequest;
use App\Skill;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class skillApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('utalent_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skills = Skill::all();
        return  response(['skill'=>$skills]);

        
    }


        function searchskill(Request $request)
        {

            if($request->get('search')){
                $search = $request->get('search');



                $employees = Skill::select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->orderby('name','asc')->get();

                $response = array();
                foreach($employees as $employee){
                

                    $response[] = array("value"=>$employee->id,"label"=>$employee->name);
                }
        return  response(['skill'=>$response]);
            
                            }
        }

    public function create()
    {
        abort_if(Gate::denies('utalent_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        
    }

    public function store(StoreSkillRequest $request)
    {
        $skill = Skill::create($request->all());
      
        return  response(['success'=>'Skill'. $request['name'].' Added Successfully', 'skill'=>$skill]);


       
    }

    public function edit(Skill $skill)
    {
        abort_if(Gate::denies('utalent_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skill->load('created_by');

        return response(['skill'=>$skill]);
    }

    public function update(UpdateSkillRequest $request, Skill $skill)
    {
        $skill->update($request->all());

        return response(['skill'=>$skill,200]);
    }

    public function show(Skill $skill)
    {
        abort_if(Gate::denies('utalent_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skill->load('created_by');

        return response(['skill'=>$skill]);
    }

    public function destroy(Skill $skill)
    {
        abort_if(Gate::denies('utalent_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $skill->delete();
return response(['skill'=>$skill]);
    }

    public function massDestroy(MassDestroySkillRequest $request)
    {
        Skill::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
