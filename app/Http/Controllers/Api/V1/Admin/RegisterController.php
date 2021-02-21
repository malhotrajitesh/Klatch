<?php

namespace App\Http\Controllers\Api\V1\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Profile;
use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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


