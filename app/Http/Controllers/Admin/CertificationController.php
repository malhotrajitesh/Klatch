<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Certification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pcert_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certifications = Certification::all();

        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
     //   abort_if(Gate::denies('pcert_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.certifications.create');
    }

  

    public function store(Request $request)
    {


       $files1 = $request->file('cert_file');
  $requestData = $request->all();


 

          if (isset($files1))
                    {
                        $destinationPath = 'public/image/uvapcert/';
                       $fileName1 = "pcert-" . time() . '.' . $request->cert_file->getClientOriginalExtension();

                        $files1->move($destinationPath, $fileName1);

                    
                     
                    $requestData['cert_file'] = $fileName1;

                        }
          
                 Certification::create($requestData);


            	 return redirect()->back()->with('success','This Certification 
                    '. $request['cert_name'].' Added Successfully');
            }
      

       
  

    public function edit(Certification $certification)
    {
        abort_if(Gate::denies('pcerti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certification->load('created_by');

        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {

         $requestData = $request->all();
         $files1 = $request->file('cert_file');
   

          if (isset($files1))
                    {
                       $fileName1 = $uid."-pcert-" . time() . '.' . $request->cert_file->getClientOriginalExtension();

                        $files1->move($destinationPath, $fileName1);
                       $requestData['cert_file'] = $fileName1;

                        }

        $certification->update($requestData);
      
       
return redirect()->back()->with(['Your Certification Details'. $request['cert_name'].' Updated Successfully']);

    }

    public function show(Certification $Certification)
    {
        abort_if(Gate::denies('pcerti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $Certification->load('created_by');

        return view('admin.certifications.show', compact('Certification'));
    }

    public function destroy(Certification $Certification)
    {
        abort_if(Gate::denies('pcerti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $Certification->delete();
      

        return back();
    }

   
}
