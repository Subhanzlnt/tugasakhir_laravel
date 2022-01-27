<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembayaran;
use App\Alat;
use Auth;
use DB;

class PemesananController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:owner');
  }

  public function index(){
    $totals = DB::table('pembayarans')->select('no_transaksi',DB::raw('SUM(total) as total_semua'))->groupBy('no_transaksi')->get();
    $pembayarans = Pembayaran::orderBy('id','DESC')->get();
    return view('pages.pemilik.pemesanan', compact('pembayarans', 'totals'));
  }
}
