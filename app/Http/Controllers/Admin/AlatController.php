<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alat;
use App\Kategori;
use Auth;

class AlatController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function alat(){
    $alats = Alat::orderBy('id', 'DESC')->where('tipe', 'Alat')->get();
    return view('pages.admin.alat', compact('alats'));
  }

  
  public function create(){
    
    $kategoris = Kategori::orderBy('nama','ASC')->get();
    return view('pages.admin.alat.tambah', compact('kategoris'));
  }

  public function store(Request $request){
    $this->validate($request,[
      'nama' => 'string|min:3|max:255|regex:/^[\pL\s\-]+$/u',
      'keterangan' => 'regex:/[a-zA-Z0-9\s]+/|min:10',
      'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
    ]);
    $harga = str_replace('.','',$request->harga);
    if ($harga < 50000) {
      return back()->withInput()->with('error','Harga minimal Rp. 1.000');
    }

    if ($request->stok < 1) {
      return back()->withInput()->with('errorStok','Stok tidak bolek kurang dari 1');
    }
    $gambar = $request->file('gambar')->store('alat');
    Alat::create([
      'nama' => $request->nama,
      'slug' => str_slug($request->nama),
      'id_kategori' => $request->id_kategori,
      'keterangan' => $request->keterangan,
      'harga' => $harga,
      'stok' => $request->stok,
      'gambar' => $gambar,
      'tipe' => 'Alat',
      'id_pemilik' => Auth::user()->id
    ]);

    return redirect()->route('admin.alat')->with('success','Alat berhasil ditambahkan');
  }

  public function edit($id,$slug){
    $alat = Alat::where('id_pemilik', Auth::user()->id)->where('tipe','Alat')->where('id',$id)->first();
    $kategoris = Kategori::orderBy('nama','ASC')->get();
    return view('pages.admin.alat.edit', compact('kategoris','alat'));
  }

  public function update(Request $request,Alat $alat){
    $this->validate($request,[
      'nama' => 'string|min:3|max:255|regex:/^[\pL\s\-]+$/u',
      'keterangan' => 'regex:/[a-zA-Z0-9\s]+/|min:10',
      'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
    ]);
    $harga = str_replace('.','',$request->harga);
    if ($harga < 50000) {
      return back()->withInput()->with('error','Harga minimal Rp. 50.000');
    }

    if ($request->stok < 1) {
      return back()->withInput()->with('errorStok','Stok tidak bolek kurang dari 1');
    }
    $gambar = $alat->gambar;
    if ($request->gambar != null) {
      $gambar = $request->file('gambar')->store('alat');
      $gambar_path = $alat->gambar;
      if (Storage::exists($gambar_path)) {
        Storage::delete($gambar_path);
      }
    }
    $alat->update([
      'nama' => $request->nama,
      'slug' => str_slug($request->nama),
      'id_kategori' => $request->id_kategori,
      'keterangan' => $request->keterangan,
      'harga' => $harga,
      'stok' => $request->stok,
      'gambar' => $gambar,
      'tipe' => 'Alat',
      'id_pemilik' => Auth::user()->id
    ]);

    return redirect()->route('admin.alat')->with('success','Alat berhasil diubah');
  }

  public function destroy(Alat $alat){
    $gambar_path = $alat->gambar;
    if (Storage::exists($gambar_path)) {
      Storage::delete($gambar_path);
    }
    $alat->delete();
    return redirect()->route('admin.alat')->with('success','Alat berhasil dihapus');
  }


  public function paket(){
    $alats = Alat::orderBy('id', 'DESC')->where('tipe', 'Paketan')->get();
    return view('pages.admin.paket', compact('alats'));
  }



  public function create_paket(){
    $kategoris = Kategori::orderBy('nama','ASC')->get();
    return view('pages.admin.paket.tambah', compact('kategoris'));
  }

  public function store_paket(Request $request){
    $this->validate($request,[
      'nama' => 'string|min:3|max:255|regex:/^[\pL\s\-]+$/u',
      'keterangan' => 'regex:/[a-zA-Z0-9\s]+/|min:10',
      'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
    ]);
    $harga = str_replace('.','',$request->harga);
    if ($harga < 50000) {
      return back()->withInput()->with('error','Harga minimal Rp. 50.000');
    }

    if ($request->stok < 1) {
      return back()->withInput()->with('errorStok','Stok tidak bolek kurang dari 1');
    }
    $gambar = $request->file('gambar')->store('alat');
    Alat::create([
      'nama' => $request->nama,
      'slug' => str_slug($request->nama),
      'id_kategori' => $request->id_kategori,
      'keterangan' => $request->keterangan,
      'harga' => $harga,
      'stok' => $request->stok,
      'gambar' => $gambar,
      'tipe' => 'Paketan',
      'id_pemilik' => Auth::user()->id
    ]);

    return redirect()->route('admin.paket')->with('success','Paket berhasil ditambahkan');
  }

  public function edit_paket($id,$slug){
    $alat = Alat::where('id_pemilik', Auth::user()->id)->where('tipe','Paketan')->where('id',$id)->first();
    $kategoris = Kategori::orderBy('nama','ASC')->get();
    return view('pages.admin.paket.edit', compact('kategoris','alat'));
  }

  public function update_paket(Request $request,Alat $alat){
    $this->validate($request,[
      'nama' => 'string|min:3|max:255|regex:/^[\pL\s\-]+$/u',
      'keterangan' => 'regex:/[a-zA-Z0-9\s]+/|min:10',
      'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
    ]);
    $harga = str_replace('.','',$request->harga);
    if ($harga < 50000) {
      return back()->withInput()->with('error','Harga minimal Rp. 50.000');
    }

    if ($request->stok < 1) {
      return back()->withInput()->with('errorStok','Paket tidak bolek kurang dari 1');
    }
    $gambar = $alat->gambar;
    if ($request->gambar != null) {
      $gambar = $request->file('gambar')->store('alat');
      $gambar_path = $alat->gambar;
      if (Storage::exists($gambar_path)) {
        Storage::delete($gambar_path);
      }
    }
    $alat->update([
      'nama' => $request->nama,
      'slug' => str_slug($request->nama),
      'id_kategori' => $request->id_kategori,
      'keterangan' => $request->keterangan,
      'harga' => $harga,
      'stok' => $request->stok,
      'gambar' => $gambar,
      'tipe' => 'Paketan',
      'id_pemilik' => Auth::user()->id
    ]);

    return redirect()->route('admin.paket')->with('success','Paket berhasil diubah');
  }

  public function destroy_paket(Alat $alat){
    $gambar_path = $alat->gambar;
    if (Storage::exists($gambar_path)) {
      Storage::delete($gambar_path);
    }
    $alat->delete();
    return redirect()->route('admin.paket')->with('success','Paket berhasil dihapus');
  }  

}
