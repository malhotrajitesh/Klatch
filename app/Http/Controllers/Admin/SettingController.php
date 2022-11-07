<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Setting;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SettingController extends Controller
{
  

 public function index()
    {
        return view('admin.settings.index');
    }

    public function store(Request $request)
    {
        $rules = Setting::getValidationRules();
        $data = $this->validate($request, $rules);

        $validSettings = array_keys($rules);

        foreach ($data as $key => $val) {
            if( in_array($key, $validSettings) ) {
                Setting::add($key, $val, Setting::getDataType($key));
            }
        }

        return redirect()->back()->with('status', 'Settings has been saved.');
    }


   
}
