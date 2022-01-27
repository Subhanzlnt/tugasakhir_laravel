<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logoutAdmin');
    }

    public function showLoginFrom(){
      return view('authAdmin.login');
    }

    public function login(Request $request){
      // dd($request->all());
      $this->validate($request, [
        'username' => 'required|string',
        'password' => 'required|string|min:8'
      ]);
      $credential = [
        'username' => $request->username,
        'password' => $request->password
      ];

      if(Auth::guard('admin')->attempt($credential, $request->memeber)) {
        return redirect()->route('admin.beranda');
    }
    return redirect()->back()
    ->withInput($request->only('username','remember'))
    ->with('error','Login gagal, Silahkan coba lagi');
    }

    public function logoutAdmin(Request $request)
    {
      Auth::guard('admin')->logout();
      return redirect('/admin/login');
    }
}
