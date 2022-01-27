<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keranjang;
use App\Alat;
use App\Paketan;
use Auth;

class KeranjangController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function store(Request $request, Alat $alat){
    // dd($request->all())
    $keranjang = Keranjang::where('id_penyewa', Auth::user()->id)->where('id_alat',$alat->id)->first();
    if($keranjang != null){
      return redirect()->back()->with('error','Alat sudah dalam keranjang');
    }
    $qty = 1;
    if($request->qty){
      $qty = $request->qty;
    }
      Keranjang::create([
        'id_penyewa' => Auth::user()->id,
        'id_alat' => $alat->id,
        'qty' => $qty,
        'total' => $alat->harga*$qty
      ]);

      return redirect()->back()->with('success','Berhasil ditambakan ke keranjang');
  }

  public function destroy(Keranjang $keranjang){
    $keranjang->delete();

    return redirect()->back()->with('success','Berhasil dihapus');
  }

  public function show(){
    $keranjangs = Keranjang::where('id_penyewa', Auth::user()->id)->get();

    return view('keranjang', compact('keranjangs'));
  }

  public function checkout(Request $request){
    if (Auth::user()->email_verified_at == null) {
      return redirect()->back()->with('error','Gagal, Email belum dikonfirmasi');
    }
    $count = count($request->id_keranjang);
    for ($i=0; $i < $count; $i++) {
      Keranjang::where('id',$request->id_keranjang[$i])
      ->update([
        'qty' => $request->stok[$i],
        'total' => $request->total_harga[$i],
        'durasi' => $request->durasi,
        'tgl_pinjam' => $request->tgl_pinjam,
        'tgl_kembali' => $request->tgl_kembali
      ]);
    }
    return redirect()->route('pemesanan');
  }
}
