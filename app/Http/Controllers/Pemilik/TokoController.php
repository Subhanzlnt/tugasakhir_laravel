<?php

namespace App\Http\Controllers\Pemilik;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Toko;
use Auth;
use Storage;

class TokoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:owner');
  }

  public function index(){
    $toko = Toko::where('id_pemilik', Auth::user()->id)->first();
    return view('pages.pemilik.toko.index', compact('toko'));
  }

  public function create(){
    $toko = Toko::where('id_pemilik', Auth::user()->id)->first();
    if ($toko != null) {
      return redirect()->route('pemilik.toko');
    }elseif (Auth::user()->no_rek == null) {
      return redirect()->route('pemilik.toko')->with('error','Lengkapi profil terlebih dahulu');
    }
    return view('pages.pemilik.toko.tambah');
  }

  public function store(Request $request){
    $this->validate($request, [
      'nama' => 'min:5|regex:/^[\pL\s\-]+$/u|max:30',
      'keterangan' => 'min:10|regex:/[a-zA-Z0-9\s]+/|max:100',
      'foto_toko' => 'image|mimes:jpg,png,jpeg|max:2048'
    ]);
    $foto_toko = $request->file('foto_toko')->store('toko');
    Toko::create([
      'nama' => $request->nama,
      'slug' => str_slug($request->nama),
      'keterangan' => $request->keterangan,
      'foto_toko' => $foto_toko,
      'id_pemilik' => Auth::user()->id
    ]);

    return redirect()->route('pemilik.toko')->with('success','Toko berhasil ditambahkan');
  }

  public function edit(){
    $toko = Toko::where('id_pemilik', Auth::user()->id)->first();
    return view('pages.pemilik.toko.edit', compact('toko'));
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
