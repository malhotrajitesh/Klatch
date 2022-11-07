<?php


namespace App\Http\Controllers\Api\V1\Admin;

use App\Feedback;
use App\PasswordHistory;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class FeedbackApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


  public function ulpassword(Request $request)
   {

        request()->validate([
          'old_password' => 'required',
            'password' => 'required|min:8|string|confirmed',
        ]);

     $uid = Auth()->user()->id;
     $user = User::findOrFail($uid);
  

if(Hash::check($request->old_password, $user->password))
{

        $passwordHistories = $user->passwordHistories()->take(5)->get();
        foreach($passwordHistories as $passwordHistory){
            //echo $passwordHistory->password;
            if (Hash::check($request['password'], $passwordHistory->password)) {
                // The passwords matches
                return response(['msg'=>'fail', 'message'=>'Your new password can not be same as any of your recent passwords. Please choose a new password.']);
            }
        }

     

        //entry into password history
         $newpass = bcrypt($request->password);
        $passwordHistory = PasswordHistory::create([
            'created_by_id' => $uid,
            'password' =>  $newpass
        ]);


     $data =$user->update(['password' => $newpass]);
     
     return response(['msg'=>'Success', 'message'=>$data]);

}
else{
return response(['msg'=>'Fail', 'message'=>'Your Old Password Not matched']); 

}


   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
         $feedback = Feedback::create($request->all());
         return response(['feedbak'=>$feedback])->setStatusCode(Response::HTTP_CREATED);

  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }
}
