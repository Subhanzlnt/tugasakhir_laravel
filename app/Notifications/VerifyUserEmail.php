<?php

namespace App\Notifications;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;


class VerifyUserEmail extends VerifyEmailBase
{
  protected function verificationUrl($notifiable){
    return URL::temporarySignedRoute(
    'verificationUser.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
  );
  }
}
