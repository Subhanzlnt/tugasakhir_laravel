<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request){
      //dd($request->all());
      if ($request->type == 'pemilik') {
        $this->validate($request,[
          'nama' => 'string|min:3|max:255|regex:/^[\pL\s\-]+$/u',
          'username' => 'string|min:3|max:255|alpha_dash|unique:owners',
          'email' => 'string|email|max:255|unique:owners',
          'password' => 'string|min:8|confirmed'
        ]);
        $owner = Owner::create([
          'nama' => $request->nama,
          'username' => $request->username,
          'email' => $request->email,
          'password' => bcrypt($request->password)
        ]);
          $owner->sendEmailOwnerVerificationNotification();
      }else {
        $this->validate($request,[
          'nama' => 'string|min:3|max:255|regex:/^[\pL\s\-]+$/u',
          'username' => 'string|min:3|alpha_dash|max:255|unique:users',
          'email' => 'string|email|max:255|unique:users',
          'password' => 'string|min:8|confirmed'
        ]);

        $user = User::create([
          'nama' => $request->nama,
          'username' => $request->username,
          'email' => $request->email,
          'password' => bcrypt($request->password)
        ]);
        $user->sendEmailUserVerificationNotification();
      }

      return redirect()->route('login')->with('success','Pendaftaran berhasil silahkan login, Silahkan cek email anda');
    }
}
