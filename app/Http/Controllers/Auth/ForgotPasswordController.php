<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function changePassword(Request $request){

        if ((Hash::check($request->get('password'), Auth::user()->password))) {
            // The passwords matches
             return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }


        $validatedData = $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

          $user = Auth::user();
        $passwordHistories = $user->passwordHistories()->take(5)->get();
        foreach($passwordHistories as $passwordHistory){
            echo $passwordHistory->password;
            if (Hash::check($request->get('password'), $passwordHistory->password)) {
                // The passwords matches
                return redirect()->back()->with("error","Your new password can not be same as any of your recent passwords. Please choose a new password.");
            }
        }

        //Change Password
        $user->password = bcrypt($request->get('password'));
        $user->save();

        //entry into password history
        $passwordHistory = PasswordHistory::create([
            'created_by_id' => $user->id,
            'password' => bcrypt($request->get('password'));
        ]);

        return redirect()->back()->with("success","Password changed successfully !");

    }


    public function __construct()
    {
        $this->middleware('guest');
    }
}
