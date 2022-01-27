<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class PenyewaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index(){
    $users = User::orderBy('id','DESC')->get();
    return view('pages.admin.penyewa', compact('users'));
  }
}
