<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Owner;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Auth\Events\Verified;

class VerificationOwnerController extends Controller
{
  use VerifiesEmails;

  public function verify(Request $request){
    $ownerID = $request['id'];
    $owner = Owner::findOrFail($ownerID);
    if ($owner->email_verified_at != null) {
        $message = "Email Anda Telah di Verifikasi";
        return view('auth.verify', compact('message'));
    }else {
      $date = date("Y-m-d g:i:s");
      $owner->email_verified_at = $date;
      $owner->save();
      $message = "Selamat, Email Anda telah di Verifikasi";
      return view('auth.verify', compact('message'));
    }
}
}
