<?php
namespace App\Http\Controllers\Admin;

use App\City;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CityController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('city_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $citys = City::withTrashed()->get();

        return view('admin.citys.index', compact('citys'));
    }



    public function create()
    {
        abort_if(Gate::denies('city_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.citys.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(['city_name' => 'unique:citys']);



                 City::create($request->all());


        return redirect()->route('admin.citys.index')->with('success','This City 
                    '. $request['city_name'].' Added Successfully');
    }

    public function edit(City $city)
    {
        abort_if(Gate::denies('city_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $city;

        return view('admin.citys.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $validatedData = $request->validate(['city_name' => 'unique:citys,city_name,'.$city->id,]);

        $city->update($request->all());

        return redirect()->route('admin.citys.index');
    }

    public function show(City $city)
    {
        abort_if(Gate::denies('city_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $city;

        return view('admin.citys.show', compact('city'));
    }



    public function destroy(City $city)
    {
        abort_if(Gate::denies('city_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    

        $city->delete();

        return back();
    }


    public function massDestroy(Request $request)
    {


       City::withTrashed()->whereIn('id', request('ids'))->restore();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
