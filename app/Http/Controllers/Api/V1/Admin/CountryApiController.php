<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Country;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CountryApiController extends Controller
{
    public function index()
    {
       // abort_if(Gate::denies('cntry_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countrys = Country::get();

        return response(['country'=>$countrys]);
    }

    public function create()
    {
       
    }

    public function store(StoreCountryRequest $request)
    {
      
    }

    public function edit(Country $country)
    {
       
    }

    public function update(UpdateCountryRequest $request, Country $Country)
    {
     
    }

    public function show(Country $country)
    {
        
    }

    public function destroy(Country $country)
    {
      
    }

   

    public function massDestroy(Request $request)
    {
       
    }
}
