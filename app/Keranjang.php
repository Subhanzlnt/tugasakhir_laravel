<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
  protected $guarded = [];

  public function user(){
    return $this->belongsTo(User::class, 'id_penyewa', 'id');
  }
  public function alat(){
    return $this->belongsTo(Alat::class, 'id_alat', 'id');
  }

  public function alats(){
    return $this->hasMany(Alat::class, 'id', 'id_alat');
  }
}
