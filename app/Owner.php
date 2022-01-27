<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\VerifyOwnerEmail;

class Owner extends Authenticatable
{
  use Notifiable;

  protected $guarded = [];

  protected $hidden = [
    'password','remember_token'
  ];

  public function toko(){
    return $this->belongsTo(Toko::class, 'id', 'id_pemilik');
  }
  protected $casts = [
      'email_verified_at' => 'datetime',
  ];

  public function sendEmailOwnerVerificationNotification()
  {
    $this->notify(new VerifyOwnerEmail); // my notification
  }
}
