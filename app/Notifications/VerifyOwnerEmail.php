<?php

namespace App\Notifications;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyOwnerEmail extends VerifyEmailBase
{
  protected function verificationUrl($notifiable){
    return URL::temporarySignedRoute(
    'verificationOwner.verify', Carbon::now()->addMinutes(60), ['id' => $notifiable->getKey()]
  );
  }
}
