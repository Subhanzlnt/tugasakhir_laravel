@extends('templates.user.default')
@section('content')
<hr>
  <div class="my-account-section section pt-90 pt-lg-70 pt-md-60 pt-sm-50 pt-xs-40 pb-95 pb-lg-75 pb-md-65 pb-sm-55 pb-xs-45">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="my-account-form-area">
                   @if(Session::has('error') || $errors->has('username') || $errors->has('password'))
                   <div class="alert alert-danger" role="alert">
                     Login gagal, Silahkan coba lagi
                   </div>
                   @elseif(Session::has('success'))
                   <div class="alert alert-success" role="alert">
                     {{Session::get('success')}}
                   </div>
                   @endif
                     <form action="{{route('login')}}" method="post">
                       @csrf
                         <h2>Login</h2>
                         <div class="single-input">
                           <label for="orderid">Username <span class="required">*</span></label>
                           <input type="text" class="form-control  @if($errors->has('username') || $errors->has('password')) is-invalid @endif" name="username" value="{{ old('username') }}" required autofocus>
                           @if($errors->has('username') || $errors->has('password'))
                               <span class="invalid-feedback" role="alert">
                                   <strong>Username atau password yang anda masukan salah</strong>
                               </span>
                           @endif
                         </div>
                         <div class="single-input">
                           <label for="orderid">Password <span class="required">*</span></label>
                           <input id="password" type="password" class="form-control" name="password" autocomplete="new-password" required>
                         </div>
                         <label>
                             <input class="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox">
                             <span>Remember me</span>
                         </label>
                         <button class="shop-btn submit-btn">Login</button>
                         <p class="lost-pass"><a href="{{url('password/reset')}}">Lupa password?</a></p>
                        <p class="lost-pass"><a href="{{route('register')}}">Belum Punya akun?</a></p>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
