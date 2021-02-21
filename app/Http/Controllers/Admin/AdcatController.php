<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAdcatRequest;
use App\Http\Requests\StoreAdcatRequest;
use App\Http\Requests\UpdateAdcatRequest;
use App\Adcat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdcatController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('a_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adcats = Adcat::all();

        return view('admin.adcats.index', compact('adcats'));
    }

    public function create()
    {
        abort_if(Gate::denies('a_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.adcats.create');
    }

    public function store(StoreAdcatRequest $request)
    {
        $adcat = Adcat::create($request->all());

        return redirect()->route('admin.adcats.index');
    }

    public function edit(Adcat $adcat)
    {
        abort_if(Gate::denies('a_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adcat->load('created_by');

        return view('admin.adcats.edit', compact('adcat'));
    }

    public function update(UpdateAdcatRequest $request, Adcat $adcat)
    {
        $adcat->update($request->all());

        return redirect()->route('admin.adcats.index');
    }

    public function show(Adcat $adcat)
    {
        abort_if(Gate::denies('a_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adcat->load('created_by');

        return view('admin.adcats.show', compact('adcat'));
    }

    public function destroy(Adcat $adcat)
    {
        abort_if(Gate::denies('a_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $adcat->delete();

        return back();
    }

    public function massDestroy(MassDestroyAdcatRequest $request)
    {
        Adcat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
