<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pembayaran;
use DB;

class PemesananController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index(){
    $totals = DB::table('pembayarans')->select('no_transaksi',DB::raw('SUM(total) as total_semua'))->groupBy('no_transaksi')->get();
    $pembayarans = Pembayaran::orderBy('id','DESC')->get();
    return view('pages.admin.pemesanan', compact('pembayarans','totals'));
  }

  public function update(Request $request, $transakasi){
    // $this->validate($request,[
    //   'bukti' => 'required|mimes:jpeg,jpg,png|max:2048'
    // ]);

    $pembayarans = Pembayaran::where('no_transaksi',$transakasi)->where('status', 1)->get();
    // $bukti = $request->file('bukti')->store('bukti');
   
    foreach ($pembayarans as $pembayaran) {
      $pembayaran->alat->update([
        'stok' => $pembayaran->alat->stok-$pembayaran->qty
      ]);

      $pembayaran->update([
        //'bukti_admin' => $bukti,
        'status' => 2,
      ]);
    }

    return redirect()->back()->with('success','Pemesanan Diproses');
  }

  public function pengembalian(Request $request, $transakasi){
    // $this->validate($request,[
    //   'bukti' => 'required|mimes:jpeg,jpg,png|max:2048'
    // ]);
    $pembayarans = Pembayaran::where('no_transaksi',$transakasi)->where('status', 2)->get();
   
    // $bukti = $request->file('bukti')->store('bukti');
    foreach ($pembayarans as $pembayaran) {
      $pembayaran->alat->update([
        'stok' => $pembayaran->alat->stok+$pembayaran->qty
      ]);

      $pembayaran->update([
        //'bukti_admin' => $bukti,
        'status' => 3,
        'keterangan_denda' => $request->keterangan,
        'denda' => $request->denda
      ]);
    }

    return redirect()->back()->with('success','Pengembalian Sukses');
  }
}
