<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toko extends Model
{
    protected $guarded = [];

    public function owner(){
      return $this->belongsTo(Owner::class, 'id_pemilik', 'id');
    }
}
