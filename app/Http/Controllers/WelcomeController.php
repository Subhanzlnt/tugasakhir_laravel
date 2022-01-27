<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alat;
use App\Keranjang;
use App\Kategori;
use Auth;
use DB;
class WelcomeController extends Controller
{

    public function index(){
      $keranjangs = [];
      if(Auth::user() != null){
          $keranjangs = Keranjang::where('id_penyewa',Auth::user()->id)->get();
      }
      $headers = Alat::orderBy('id', 'DESC')->paginate(3);
      $alats = Alat::orderBy('id', 'DESC')->paginate(9);
      return view('welcome',compact('headers', 'alats', 'keranjangs'));
    }

    public function contact(){
      $keranjangs = [];
      if(Auth::user() != null){
          $keranjangs = Keranjang::where('id_penyewa',Auth::user()->id)->get();
      }
      return view('kontak', compact('keranjangs'));
    }

    public function showAll(){
      $keranjangs = [];
      if(Auth::user() != null){
          $keranjangs = Keranjang::where('id_penyewa',Auth::user()->id)->get();
      }
      $alats = Alat::orderBy('id', 'DESC')->paginate(12);
      $kategoris = Kategori::orderBy('nama','ASC')->get();
      return view('alat', compact('keranjangs','kategoris','alats'));
    }

    public function show($id,$slug){
      $keranjangs = [];
      if(Auth::user() != null){
          $keranjangs = Keranjang::where('id_penyewa',Auth::user()->id)->get();
      }
      $alat = Alat::where('id',$id)->first();
      return view('detail_alat', compact('keranjangs','alat'));
    }

    public function category($slug){
      $keranjangs = [];
      if(Auth::user() != null){
          $keranjangs = Keranjang::where('id_penyewa',Auth::user()->id)->get();
      }
      $kategori = Kategori::where('slug',$slug)->first();
      $alats = Alat::orderBy('id','DESC')->where('id_kategori',$kategori->id)->paginate(12);
      $kategoris = Kategori::orderBy('nama','ASC')->get();
      return view('alat', compact('keranjangs','kategoris','alats'));
    }
}
