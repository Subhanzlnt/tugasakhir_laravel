<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
  protected $guarded = [];

  public function alats(){
    return $this->hasMany(Alat::class, 'id_kategori', 'id');
  }
}
