<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

class VerificationUserController extends Controller
{
    use VerifiesEmails;

    public function verify(Request $request){
      $userID = $request['id'];
      $user = User::findOrFail($userID);
      if ($user->email_verified_at != null) {
          $message = "Email Anda Telah di Verifikasi";
          return view('auth.verify', compact('message'));
      }else {
        $date = date("Y-m-d g:i:s");
        $user->email_verified_at = $date;
        $user->save();
        $message = "Selamat, Email Anda telah di Verifikasi";
        return view('auth.verify', compact('message'));
      }
    }

    // public function resend(Request $request){
    //   if ($request->user()->hasVerifiedEmail()) {
    //     return response()->json('User already have verified email', 422);
    //   }
    //   $request->user()->sendEmailVerificationNotification();
    //   return response()->json('the notification has been resubmitted');
    // }
}
