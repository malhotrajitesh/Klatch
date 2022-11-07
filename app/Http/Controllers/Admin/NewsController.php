<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\News;
use App\Dycat;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('news_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $news =  News::latest()->simplePaginate(100);  
        return view('admin.news.index', compact('news'));

      
    }

    public function create()
    {
        abort_if(Gate::denies('news_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $dycats = Dycat::where('cat_type', 'cat5')->pluck('cat_name', 'id')->prepend(trans('global.pleaseSelect'), '');

      return view('admin.news.create',compact('dycats'));
    }



  

    public function store(Request $request)
    {


$validatedData= $request->all();

  

   $files = $request->file('nspic');

  

    
  if($files)
  {
    $destinationPath = 'public/image/news/';
    $uid= auth()->user()->id;
     $fileName1 = $uid."-n-ws-".time() . '.'.$request->nspic->getClientOriginalExtension();
 $files->move($destinationPath, $fileName1);

   $validatedData['nspic'] = $fileName1;

 }


                 News::create($validatedData);

                 $response= 'This news 
                    '. $request['nstitle'].' Added Successfully';
                    
                      return redirect()->route('admin.news.index');
          
      
}
       
  

    public function edit(News $news)
    {
        abort_if(Gate::denies('news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
     $dycats = Dycat::where('cat_type', 'cat5')->pluck('cat_name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $news->load('created_by');
return view('admin.news.edit', compact('news','dycats'));

        
    }



    public function update(Request $request, News $news)
    {

      $validatedData= $request->all();

  
  $files = $request->file('nspic');

  

    
  if($files)
  {
    $destinationPath = 'public/image/news/';
    $uid= auth()->user()->id;
     $fileName1 = $uid."-n-ws-".time() . '.'.$request->nspic->getClientOriginalExtension();
 $files->move($destinationPath, $fileName1);

   $validatedData['nspic'] = $fileName1;

 }

 $news->update($validatedData);

        return redirect()->route('admin.news.index');
    }

    public function show(News $news)
    {
        abort_if(Gate::denies('news_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $news->load('created_by');

    

        return view('admin.news.show', compact('news'));
    }

   public function destroy(News $news)
    {
        abort_if(Gate::denies('news_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $news->delete();

        return back();
    }

    public function massDestroy(Request $request)
    {
        News::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
