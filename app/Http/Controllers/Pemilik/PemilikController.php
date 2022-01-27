<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Alat;
use App\Pembayaran;
use Storage;
use DB;

class PemilikController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:owner');
  }

  public function index(){
    $alats = Alat::where('tipe', 'Alat')->where('id_pemilik', Auth::user()->id)->get();
    $pakets = Alat::where('tipe', 'Paketan')->where('id_pemilik', Auth::user()->id)->get();
    $pemesanans = Pembayaran::where('status', 1)->get();
    $pembayarans = Pembayaran::where('status', 2)->get();
    return view('pages.pemilik.beranda', compact('alats','pakets','pemesanans','pembayarans'));
  }

  public function show(){
    return view('pages.pemilik.profil');
  }

  public function update(Request $request){
    $owner = Auth::user();
    $this->validate($request, [
      'nama' => 'string|min:3|max:255|regex:/^[\pL\s\-]+$/u',
      'username' => "string|min:3|max:255|alpha_dash|unique:owners,username,$owner->id",
      'email' => "string|email|max:255|unique:owners,email,$owner->id",
      'telp' => "numeric|digits_between:10,13|unique:owners,telp,$owner->id",
      'no_rek' => 'numeric|digits_between:16,16',
      'alamat' => 'regex:/[a-zA-Z0-9\s]+/|min:10',
      'foto' => 'image|mimes:jpg,png,jpeg|max:2048'
    ]);

    if($request->foto == null){
      $foto = $owner->foto;
    }else {
      $foto = $request->file('foto')->store('foto');
      if ($request->foto != 'foto/default.png') {
        $foto_path = $owner->foto;
        if (Storage::exists($foto_path)) {
          Storage::delete($foto_path);
        }
      }
    }

    $owner->update([
      'nama' => $request->nama,
      'email' => $request->email,
      'username' => $request->username,
      'foto' => $foto,
      'telp' => $request->telp,
      'alamat' => $request->alamat,
      'no_rek' => $request->no_rek,
      'bank' => $request->bank
    ]);
    return redirect()->back()->with('success', 'Profil berhasil diubah');
  }

  public function resetPassword(Request $request){
    $user = Auth::user();
    $this->validate($request,[
      'password' => 'string|min:8|confirmed'
    ]);

    $user->update([
      'password' => bcrypt($request->password),
    ]);

    return redirect()->back()->with('success', 'Password berhasil diubah');
  }
}
