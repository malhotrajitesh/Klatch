<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Company;
use App\User;
use App\Cbranch;
use App\Party;
use Session;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       abort_if(Gate::denies('company_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $companys =Company::all();

        return view('admin.companys.index', compact('companys')); 

        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


           abort_if(Gate::denies('company_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    
     
  $cbranchs = Cbranch::all()->pluck('name', 'id');


      
   
        return view('admin.companys.create', compact('cbranchs'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

$validatedData = $request->validate([


    'cmname' =>'required|unique:companys',
    

  ]);



        if ($files = $request->file('logo')) {

          
            $files2 = $request->file('inco_cert');
            $destinationPath = 'public/image/clogo';
            $destinationPath2 = 'public/image/ucert';
            $fileName =  "uvaclogo-".time().'.'.$request->logo->getClientOriginalExtension();
             $fileName2 =  "uvacert-".time().'.'.$request->inco_cert->getClientOriginalExtension();
             $files->move($destinationPath, $fileName);
             $files2->move($destinationPath2, $fileName2);
         }
         else{

            $fileName = "defaultcl.jpg";
              $fileName2 = "defaultci.jpg";
         }
         //   $request->image->storeAs('image', $fileName);

           $company = Company::create([
            'cmname' => $request['cmname'],
            'cpname' => $request['cpname'],
             'gst' => $request['gst'],
            'pan_nmbr' => $request['pan_nmber'],
            'address' => $request['address'],
             'pincode' => $request['pincode'],
                'city' => $request['city'],
            'state' => $request['state'],
            'country' => $request['country'],
             'contact_no' => $request['contact_no'],
              'alt_no' => $request['alt_no'],
     
            'email' => $request['email'],
      
             'created_by_id' => $request['created_by_id'],
            'logo' => $fileName,
            'inco_cert'=> $fileName2
            


        ]);
       
       $company->cbranchs()->sync($request->input('cbranchs', []));

        return redirect()->route('admin.companys.index')->withSuccess('Company Updated Successfully ');
   
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(company $company)
    {

            abort_if(Gate::denies('company_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    // $company->load('created_by');


        return view('admin.companys.show', compact('company'));

        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
         abort_if(Gate::denies('company_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
 // $company->load('created_by');

       

        return view('admin.companys.edit', compact('company'));
        //
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {


          if ($files = $request->file('image')) {
            
            $destinationPath = 'public/image/';
            $fileName =  "image-".time().'.'.$request->image->getClientOriginalExtension();
             $files->move($destinationPath, $fileName);
         //   $request->image->storeAs('image', $fileName);   
    }
    else{

    	$fileName=$company->logo;
    }


        $company->update([
            'cmname' => $request['cmname'],
            'cid' => $request['cid'],
             'gst' => $request['gst'],
            'invoice' => $request['invoice'],
            'address' => $request['address'],
             'pincode' => $request['pincode'],
                'city' => $request['city'],
            'state' => $request['state'],
            'country' => $request['country'],
             'contact_no' => $request['contact_no'],
              'alt_no' => $request['alt_no'],
     'ref_no' => $request['ref_no'],
            'email' => $request['email'],
             'date' => $request['date'],
             'created_by_id' => $request['created_by_id'],
            'logo' => $fileName
            


        ]);
       
      

        return redirect()->route('admin.companys.index')->withSuccess('Company Updated Successfully ');
        //
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
            abort_if(Gate::denies('company_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $company->delete();

        return back();
        //
    }
}
