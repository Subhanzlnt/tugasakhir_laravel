<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Owner;

class PemilikController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index(){
    $owners = Owner::orderBy('id','DESC')->get();
    return view('pages.admin.pemilik', compact('owners'));
  }
}
