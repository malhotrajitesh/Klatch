<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\News;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsApiController extends Controller
{
    public function index()
    {
      //  abort_if(Gate::denies('news_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $news =  News::latest()->get();  

        return  response(['news'=>$news]);
    }

    public function create()
    {
     //   abort_if(Gate::denies('news_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       return  response(['news'=>'create your view']);
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

/*
$validatedData= $request->all();

  

  $str = $request->input('nspic');

  $destinationPath = 'public/image/news/';

    
  if($this->is_base64($str))
  {
    $uid= auth()->user()->id;
     $fileName1 = $uid."-n-ws-".time() . '.'.'jpg';
 $file1 =  $destinationPath.$fileName1;
file_put_contents($file1,base64_decode($str));

   $validatedData['nspic'] = $fileName1;

 }


                 News::create($validatedData);

                 $response= 'This news 
                    '. $request['nstitle'].' Added Successfully';
                      return  response(['Success'=>$response]);
                      */
          
      
}
       
  

    public function edit(News $news)
    {
        abort_if(Gate::denies('news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $news->load('created_by');
return  response(['Edit'=>$news]);

        
    }



    public function update(Request $request, News $news)
    {
return back();
    }

    public function show(News $news)
    {
     //   abort_if(Gate::denies('newsi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
$news->increment('nsview');
        $news->load('created_by');

        return  response(['Show'=>$news]);
    }

    public function destroy(News $news)
    {
      
      

        return  response(['Deleted'=>'blha blha']);
    }

   
}
