<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paketan extends Model
{
    protected $guarded = [];

    public function kategori(){
      return $this->belongsTo(Kategori::class, 'id_kategori', 'id');
    }

    public function owner(){
      return $this->belongsTo(Owner::class, 'id_pemilik', 'id');
    }

    public function pembayaran(){
      return $this->belongsTo(Owner::class, 'id_alat', 'id');
    }
}
