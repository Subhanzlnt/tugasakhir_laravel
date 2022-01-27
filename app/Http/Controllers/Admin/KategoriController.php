<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;

class KategoriController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index(){
    $kategoris = Kategori::orderBy('id', 'DESC')->get();
    return view('pages.admin.kategori', compact('kategoris'));
  }

  public function store(Request $request){
    $this->validate($request, [
      'nama' => 'string|min:4|max:255|regex:/^[\pL\s\-]+$/u'
    ]);
    Kategori::create([
      'nama' => $request->nama,
      'slug' => str_slug($request->nama)
    ]);

    return redirect()->route('admin.kategori')->with('success','Kategori berhasil ditambahkan');
  }

  public function update(Request $request,Kategori $kategori){
    $this->validate($request, [
      'nama' => 'string|min:4|max:255|regex:/^[\pL\s\-]+$/u'
    ]);
    $kategori->update([
      'nama' => $request->nama,
      'slug' => str_slug($request->nama)
    ]);

    return redirect()->route('admin.kategori')->with('success','Kategori berhasil diubah');
  }

  public function destroy(Kategori $kategori){
    $kategori->delete();

    return redirect()->route('admin.kategori')->with('success','Kategori berhasil dihapus');

  }
}
