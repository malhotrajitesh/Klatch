<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\PasswordHistory;
use App\Profile;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Gate;

use Symfony\Component\HttpFoundation\Response;
use Validator;

class RegisterController extends Controller
{
     /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
   public function register(Request $request)
   {
      $validatedData = $request->validate([
            'name'=>'required|max:55',
            'email'=>'email|unique:users',
             'mobile'=>'required|unique:users',
            'password'=>'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);
              $passwrdo = bcrypt($request->password);
        $passwordHistory = PasswordHistory::create([
            'created_by_id' => $user->id,
            'password' =>  $passwrdo
        ]);
        $user_id= $user->id;
         $profile=Profile::create([
           'name' => $request['name'],
            'email' => $request['email'],
             'mobile' => $request['mobile'],
             'created_by_id' => $user_id  
          ]);
            $profile->increment('prog',25);
         $user->roles()->sync($request->input('roles', []));

        $accessToken = $user->createToken('authToken')->accessToken;

        return response(['user'=> $user, 'access_token'=> $accessToken]);
    

   }

public function forgot(Request $request)
   {
        $validatedData = $request->validate([
           
             //  'mobile'=>'required'
             'email'=>'required'
            
        ]);

// $user = User::where('mobile',$request['mobile'])->first();

$user = User::where('email',$request['email'])->first();
if($user)
{
       
  $otp = rand(100000, 999999);


  $content=urlencode("One Time Password for your User ID is : $otp");
  // $mobile =$request['mobile'];
  $email =$request['email'];
 /* $url = 'www.google.com';
  
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$returndata = curl_exec($ch);
$err = curl_error($ch);
      curl_close($ch);
      if ($err) {
    return response(['message'=>'Fail', 'message' => $err]);
} else {
  }
*/

        $datan = $user->update(['otp' =>$otp]);
 //$datan = User::where('mobile',$request['mobile'])->update(['otp' =>$otp]);

 //return response(['message'=>'Success Otp Sent','otp'=>$otp,'mo'=>$mobile]);

    return response(['message'=>'Success Otp Sent','otp'=>$otp,'mo'=>$email]);

    


       
       }
       else{
   
          // return response(['message'=>'Fail', 'user'=> 'Your mobile number not match in our system']);
            return response(['message'=>'Fail', 'user'=> 'Your Email not match in our system']);

    
       }
   }


public function verifyotp(Request $request)
   {

        request()->validate([
            'password' => 'required|min:8|string|confirmed',
        ]);

  $ema = $request['email'];
  $otp = $request['otp'];
        if($otp==''){
            return response(['message'=>'Please Enter Otp']);
        }
        else{


          //$user = User::where('mobile',$request['mobile'])->where('otp', '=', $otp)->first();
          //User::where('mobile',$request['mobile'])->increment('otp_attempted');

$user = User::where('email',$request['email'])->where('otp', '=', $otp)->first();

        User::where('email',$request['email'])->increment('otp_attempted');
if($user)
{

        $passwordHistories = $user->passwordHistories()->take(5)->get();
        foreach($passwordHistories as $passwordHistory){
            //echo $passwordHistory->password;
            if (Hash::check($request['password'], $passwordHistory->password)) {
                // The passwords matches
                return response(['message'=>'Your new password can not be same as any of your recent passwords. Please choose a new password.']);
            }
        }

     

        //entry into password history
         $passwrdo = bcrypt($request->password);
        $passwordHistory = PasswordHistory::create([
            'created_by_id' => $user->id,
            'password' =>  $passwrdo
        ]);

 $ottp=0;
     $data =$user->update(['password' => $passwrdo , 'otp' => $ottp]);
     
     return response(['message'=>'Success', 'msg'=>'password Udated success']);

}
else{
return response(['message'=>'invalid Otp', 'otp'=>$otp, 'email'=>$ema]); 

}
}

   }

/*
 public function forgotnotuse(Request $request)
   {
        $validatedData = $request->validate([
           
          
             'email'=>'required',
            'password'=>'required'
        ]);


$user = User::where('email',$request['email'])->first();
if($user)
{
        $validatedData['password'] = bcrypt($request->password);
     $data =$user->update(['password' => $validatedData['password']]);

        return response(['message'=>'Success', 'user'=> $data]);
       }
       else{

        return response(['message'=>'Fail', 'user'=> 'Record Not Found']);
       }
   }
*/

   public function login(Request $request)
   {
        $loginData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
       
        if(!auth()->attempt($loginData)) {
            return response(['message'=>'Invalid credentials']);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;
         $userId = Auth::user()->id;
  
          $user = DB::table('users')
        ->rightJoin('role_user', 'users.id', '=', 'role_user.user_id')
        ->where('users.id', $userId)
         ->select('users.*','role_user.role_id')->get(); 
 

          $accessToken = auth()->user()->createToken('authToken')->accessToken;
          return response(['user' => $user, 'access_token' => $accessToken]);
   

   }

   public function logout()
    {
        if (Auth::check()) {
          $token = Auth::user()->token();
        $token->delete();
       
            return response(['message'=>'User logged out.']);
        }

 

        return response('Unauthorized.', [], 401);
    }

}


