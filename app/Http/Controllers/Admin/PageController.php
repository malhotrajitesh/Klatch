<?php
namespace App\Http\Controllers\Admin;

use App\Page;
use App\User;
use App\Feedback;
use App\Http\Controllers\Controller;
use Gate;
use File;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::withTrashed()->get();

        return view('admin.pages.index', compact('pages'));
    }


     public function feedback()
    {
      //  abort_if(Gate::denies('page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $feedbacks = Feedback::all();

        return view('admin.pages.feed', compact('feedbacks'));
    }

    // code below for send notif

  public function sendfcmall()
    {
        abort_if(Gate::denies('send_alert_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       

        return view('admin.pages.fcmuva');
    }

     public function saveftokn(Request $request)
    {
        auth()->user()->update(['device_token'=>$request->token]);
        return response()->json(['token saved successfully.']);
    }

     public function sendfcm(Request $request)
    {
        abort_if(Gate::denies('send_alert_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $SERVER_API_KEY = 'AAAApWP5UDY:APA91bGz5mmstKtWRC-gI0D5co6AzG6DMO5bh_DYoXv0uIUg2YiBjedpBW8Sz6Xzb3R1RuctFqPPwRO0YT2AaudPlytL1h1COEouzfFpNK1udMTju30osIvmU7ektgfOoKxnco5M9xkL';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
                "content_available" => true,
                "priority" => "high",
            ]
        ];
        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);

        dd($response);
    }


    public function create()
    {
        abort_if(Gate::denies('page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate(['page_title' => 'unique:pages']);



                 page::create($request->all());


        return redirect()->route('admin.pages.index')->with('success','This Page 
                    '. $request['page_title'].' Added Successfully');
    }

    public function edit(Page $page)
    {
        abort_if(Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page;

        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validatedData = $request->validate(['page_title' => 'unique:pages,page_title,'.$page->id,]);

        $page->update($request->all());

        return redirect()->route('admin.pages.index');
    }

    public function show(Page $page)
    {
        abort_if(Gate::denies('page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $page->load('created_by');

        return view('admin.pages.show', compact('page'));
    }

 public function getbanner(Request $request)
    {
        abort_if(Gate::denies('page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

   // $datab = File::glob(public_path('public/image/uvaad').'/*');
    $datab = glob("public/image/uvabanner/*.*");
   // print_r($files);
    // die("jio");

        return view('admin.pages.show',compact('datab'));
    }

public function uploadban(Request $request)
    {
        abort_if(Gate::denies('page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       $request->validate(['ubanner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
 $files1 = $request->file('ubanner');
  $destinationPath = 'public/image/uvabanner/';

   $fileName1 = "ban".time().'.'.$request->ubanner->getClientOriginalExtension();

                        $files1->move($destinationPath, $fileName1);
                       return back();

  // return redirect()->route('admin.pages.show')->withSuccess('Banner Added Successfully ');
 
    }

    public function bandelete(Request $request)
    {
        abort_if(Gate::denies('page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
       $request->validate(['iname' => 'required']);
       $image = $request->iname;
     File::delete($image);
                       return back();

  // return redirect()->route('admin.pages.show')->withSuccess('Banner Added Successfully ');
 
    }


    public function destroy(Page $page)
    {
        abort_if(Gate::denies('page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
    

        $page->delete();

        return back();
    }


    public function massDestroy(Request $request)
    {


       page::withTrashed()->whereIn('id', request('ids'))->restore();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
