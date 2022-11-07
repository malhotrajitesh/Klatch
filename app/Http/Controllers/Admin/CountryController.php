<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cntry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countrys = Country::withTrashed()->get();

        return view('admin.countrys.index', compact('countrys'));
    }

    public function create()
    {
        abort_if(Gate::denies('cntry_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.countrys.create');
    }

    public function store(StoreCountryRequest $request)
    {
        $Country = Country::create($request->all());

        return redirect()->route('admin.countrys.index');
    }

    public function edit(Country $country)
    {
        abort_if(Gate::denies('cntry_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $Country->load('created_by');

        return view('admin.countrys.edit', compact('Country'));
    }

    public function update(UpdateCountryRequest $request, Country $Country)
    {
        $Country->update($request->all());

        return redirect()->route('admin.countrys.index');
    }

    public function show(Country $country)
    {
        abort_if(Gate::denies('cntry_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country->load('created_by');

        return view('admin.countrys.show', compact('Country'));
    }

    public function destroy(Country $country)
    {
        abort_if(Gate::denies('cntry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $country->delete();

        return back();
    }

      public function massrestore(Country $country)
    {
        $country->withTrashed()->restore();

        return back();
     
    }

    public function massDestroy(Request $request)
    {
        Country::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
