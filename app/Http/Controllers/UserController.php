<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Keranjang;
use Auth;

class UserController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function show(){
    $keranjangs = [];
    if(Auth::user() != null){
        $keranjangs = Keranjang::where('id_penyewa',Auth::user()->id)->get();
    }
    return view('profil', compact('keranjangs'));
  }

  public function resetPassword(Request $request){
    $user = Auth::user();
    $this->validate($request,[
      'password' => 'string|min:8|confirmed'
    ]);

    $user->update([
      'password' => bcrypt($request->password),
    ]);

    return redirect()->back()->with('success','Password berhasil diganti');
  }

  public function update(Request $request){
    $user = Auth::user();
    $this->validate($request,[
      'telp' => "numeric|digits_between:10,13|unique:users,telp,$user->id",
      'alamat' => 'required|max:255|min:5',
    ]);
    $user->update([
      'telp' => $request->telp,
      'alamat' => $request->alamat
    ]);
    return redirect()->route('edit.profil')->with('success','Pemesanan berhasil');
  }


  public function member_daftar(){
    $keranjangs = [];
    if(Auth::user() != null){
        $keranjangs = Keranjang::where('id_penyewa',Auth::user()->id)->get();
    }
    return view('member', compact('keranjangs'));
  }

  public function member_update(Request $request){
    $user = Auth::user();
    $user->update([
      'member' => 1
    ]);
    return redirect()->route('semua')->with('success','Berhasil Mendaftar Sebagai Member');
  }
}
