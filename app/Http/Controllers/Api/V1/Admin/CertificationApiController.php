<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Certification;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CertificationApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pcert_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certifications = Certification::all();

        return  response(['certification'=>$certifications]);
    }

    public function create()
    {
     //   abort_if(Gate::denies('pcert_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       return  response(['certification'=>'create your view']);
    }

  

    public function store(Request $request)
    {


       $str = $request->input('cert_file');
  $requestData = $request->except('pdf_name');


 
                        $destinationPath = 'public/image/uvapcert/';
                       
 $imageName = $request['pdf_name'];
 $file =  $destinationPath.$imageName;
file_put_contents($file,base64_decode($str));

   
                    $requestData['cert_file'] = $imageName;

                 Certification::create($requestData);

                 $response= 'This Certification 
                    '. $request['cert_name'].' Added Successfully';
                      return  response(['Success'=>$response]);
            }
      

       
  

    public function edit(Certification $certification)
    {
        abort_if(Gate::denies('pcerti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certification->load('created_by');
return  response(['Edit'=>$certification]);

        
    }

    // code for check image is base 64 use in now
    public  function is_base64($str){
        if($str === base64_encode(base64_decode($str))){
            return true;
        }
        return false;
    }

    public function update(Request $request, Certification $certification)
    {


         $requestData = $request->except('pdf_name');
      
    
           $str = $request->input('cert_file');
        
   if($this->is_base64($str))
 {
     $destinationPath = 'public/image/uvapcert/';
  $imageName = $request['pdf_name'];
$file =  $destinationPath.$imageName;
file_put_contents($file,base64_decode($str));
$requestData['cert_file'] = $imageName;

 }

        $certification->update($requestData);
   return  response(['Updated'=>'Your Certification Details'. $request['cert_name'].' Updated Successfully']);   
       

    }

    public function show(Certification $certification)
    {
        abort_if(Gate::denies('pcerti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certification->load('created_by');

        return  response(['Show certificate'=>$certification]);
    }

    public function destroy(Certification $certification)
    {
        abort_if(Gate::denies('pcerti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $certification->delete();
      

        return  response(['Deleted'=>'Successfully']);
    }

   
}
