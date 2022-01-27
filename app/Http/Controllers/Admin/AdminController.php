<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Alat;
use App\Kategori;
use App\Pembayaran;
use App\Toko;
use Storage;
use DB;

class AdminController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index(){
    $alats = Alat::where('tipe', 'Alat')->get();
    $pakets = Alat::where('tipe', 'Paketan')->get();
    $pemesanans = Pembayaran::where('status', 1)->get();
    $pembayarans = Pembayaran::where('status', 2)->get();
    return view('pages.admin.beranda', compact('alats','pakets','pemesanans','pembayarans'));
  }

  
  public function toko(){
    $toko = Toko::where('id_pemilik', Auth::user()->id)->first();
    return view('pages.admin.toko.index', compact('toko'));
  }

  public function toko_edit(){
    $toko = Toko::where('id_pemilik', Auth::user()->id)->first();
    return view('pages.admin.toko.edit', compact('toko'));
  }

  public function update(Request $request){
    $this->validate($request, [
      'nama' => 'min:5|regex:/^[\pL\s\-]+$/u|max:30',
      'keterangan' => 'min:10|regex:/[a-zA-Z0-9\s]+/|max:100',
      'foto_toko' => 'image|mimes:jpg,png,jpeg|max:2048'
    ]);
    $toko = Toko::where('id_pemilik', Auth::user()->id)->first();
    if ($request->foto_toko == null) {
      $foto_toko = $toko->foto_toko;
    }else {
      $foto_toko = $request->file('foto_toko')->store('toko');
      $toko_path = $toko->foto_toko;
      if (Storage::exists($toko_path)) {
        Storage::delete($toko_path);
      }
    }

  $toko->update([
      'nama' => $request->nama,
      'slug' => str_slug($request->nama),
      'keterangan' => $request->keterangan,
      'foto_toko' => $foto_toko,
      'id_pemilik' => Auth::user()->id
    ]);

    return redirect()->route('pemilik.toko')->with('success','Toko berhasil diubah');
  }
}
