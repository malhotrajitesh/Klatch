<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Jprofile;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JprofileApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pcert_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jprofiles =  Jprofile::latest()->with('jobcategry')->get();  

        return  response(['jprofile'=>$jprofiles]);
    }

    public function create()
    {
     //   abort_if(Gate::denies('pcert_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       return  response(['jprofile'=>'create your view']);
    }


// code for check image is base 64 use in now
    public  function is_base64(&$str){
        if($str === base64_encode(base64_decode($str))){
            return true;
        }
        else{
          return false;
        }
        
    }

  

    public function store(Request $request)
    {

$validatedData= $request->all();
 if ($request->jppica ==''){

   $request->validate([ 'jppica' => 'required']);
   
   return response(['error'=>'First Image select field is required']);

 }
 else{
  $uid= auth()->user()->id;

  $str = $request->input('jppica');
  $str1 = $request->input('jppicb');
  $str2 = $request->input('jppicc');
  $str3 = $request->input('jppicd');
  $str4 = $request->input('jppice');
  $destinationPath = 'public/image/clogo/';

    
  if($this->is_base64($str))
  {
     $fileName1 = $uid."-a-jp-".time() . '.'.'jpg';
 $file1 =  $destinationPath.$fileName1;
file_put_contents($file1,base64_decode($str));

   $validatedData['jppica'] = $fileName1;

 }

 if($this->is_base64($str1))
 {
  $fileName2 = $uid."-b-jp-".time() . '.'.'jpg';
 $file2 =  $destinationPath.$fileName2;
file_put_contents($file2,base64_decode($str1));
   $validatedData['jppicb'] = $fileName2;

 }
if($this->is_base64($str2))
 {
  $fileName3 = $uid."-c-jp-".time() . '.'.'jpg';
 $file3 =  $destinationPath.$fileName3;
file_put_contents($file3,base64_decode($str2));
   $validatedData['jppicc'] = $fileName3;

 }
 if($this->is_base64($str3))
 {
  $fileName4 = $uid."-d-jp-".time() . '.'.'jpg';
 $file4 =  $destinationPath.$fileName4;
file_put_contents($file4,base64_decode($str3));
   $validatedData['jppicd'] = $fileName4;

 }
 if($this->is_base64($str4))
 {
    $fileName5 = $uid."-e-jp-".time() . '.'.'jpg';
 $file5 =  $destinationPath.$fileName5;
file_put_contents($file5,base64_decode($str4));
   $validatedData['jppice'] = $fileName5;

 }

                 Jprofile::create($validatedData);

                 $response= 'This jprofile 
                    '. $request['name'].' Added Successfully';
                      return  response(['Success'=>$response]);
            }
      
}
       
  

    public function edit(Jprofile $jprofile)
    {
        abort_if(Gate::denies('pcerti_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jprofile->load('created_by','jobcategry');
return  response(['Edit'=>$jprofile]);

        
    }



    public function update(Request $request, Jprofile $jprofile)
    {

$validatedData= $request->all();
      $uid= auth()->user()->id;

  $str = $request->input('jppica');
  $str1 = $request->input('jppicb');
  $str2 = $request->input('jppicc');
  $str3 = $request->input('jppicd');
  $str4 = $request->input('jppice');
  $destinationPath = 'public/image/clogo/';

    
  if($this->is_base64($str))
  {
     $fileName1 = $uid."-a-jp-".time() . '.'.'jpg';
 $file1 =  $destinationPath.$fileName1;
file_put_contents($file1,base64_decode($str));

   $validatedData['jppica'] = $fileName1;

 }

 if($this->is_base64($str1))
 {
  $fileName2 = $uid."-b-jp-".time() . '.'.'jpg';
 $file2 =  $destinationPath.$fileName2;
file_put_contents($file2,base64_decode($str1));
   $validatedData['jppicb'] = $fileName2;

 }
if($this->is_base64($str2))
 {
  $fileName3 = $uid."-c-jp-".time() . '.'.'jpg';
 $file3 =  $destinationPath.$fileName3;
file_put_contents($file3,base64_decode($str2));
   $validatedData['jppicc'] = $fileName3;

 }
 if($this->is_base64($str3))
 {
  $fileName4 = $uid."-d-jp-".time() . '.'.'jpg';
 $file4 =  $destinationPath.$fileName4;
file_put_contents($file4,base64_decode($str3));
   $validatedData['jppicd'] = $fileName4;

 }
 if($this->is_base64($str4))
 {
    $fileName5 = $uid."-e-jp-".time() . '.'.'jpg';
 $file5 =  $destinationPath.$fileName5;
file_put_contents($file5,base64_decode($str4));
   $validatedData['jppice'] = $fileName5;

 }

            


        $jprofile->update($validatedData);
   return  response(['Updated'=>'Your jprofile Details'. $request['name'].' Updated Successfully']);   
       

    }

    public function show(Jprofile $jprofile)
    {
        abort_if(Gate::denies('pcerti_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jprofile->load('created_by','jobcategry');

        return  response(['Show'=>$jprofile]);
    }

    public function destroy(Jprofile $jprofile)
    {
        abort_if(Gate::denies('pcerti_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jprofile->delete();
      

        return  response(['Deleted'=>'Successfully']);
    }

   
}
