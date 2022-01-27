@extends('templates.user.default')
@section('content')
<hr>
  <div class="my-account-section section pt-90 pt-lg-70 pt-md-60 pt-sm-50 pt-xs-40 pb-95 pb-lg-75 pb-md-65 pb-sm-55 pb-xs-45">
     <div class="container">
         <div class="row">
             <div class="col-lg-12">
                 <div class="my-account-form-area">
                     <form action="{{route('register')}}" method="post">
                       @csrf
                         <h2>Regsiter</h2>
                         <div class="single-input">
                             <label for="orderid">Nama <span class="required">*</span></label>
                             <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukan nama" required autofocus>

                             @error('nama')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>@if($message == 'validation.regex')
                                       Masukan nama dengan benar
                                       @else
                                       Nama terlalu pendek
                                       @endif
                                     </strong>
                                 </span>
                             @enderror
                         </div>
                         <div class="single-input">
                             <label for="orderid">Email <span class="required">*</span></label>
                             <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Masukan email" required autocomplete="email">

                             @error('email')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>Email sudah ada</strong>
                                 </span>
                             @enderror
                         </div>
                         <div class="single-input">
                             <label for="orderid">Username <span class="required">*</span></label>
                             <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Masukan username" required autofocus>

                             @error('username')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>
                                       @if($message == 'validation.alpha_dash')
                                       Penghubung username hanya boleh menggunaka underscore
                                       @else
                                       Username terlalu pendek
                                       @endif

                                     </strong>
                                 </span>
                             @enderror
                         </div>
                         <div class="single-input">
                             <label for="orderid">Password <span class="required">*</span></label>
                             <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan password" autocomplete="new-password" required>
                             @error('password')
                                 <span class="invalid-feedback" role="alert">
                                     <strong>@if($message == 'validation.min.string')
                                       Password terlalu pendek
                                       @else
                                       Password tidak sama
                                       @endif
                                     </strong>
                                 </span>
                             @enderror
                         </div>
                         <div class="single-input">
                             <label for="orderid">Konfirmasi Password <span class="required">*</span></label>
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password" autocomplete="new-password" required>
                         </div>
                         <div class="custom-control custom-radio">
                          <input type="radio" @if(old('type') == 'pemilik') checked @endif class="custom-control-input" id="pemilik" value="pemilik" name="type" required>
                          <label class="custom-control-label" for="pemilik">Pemilik</label>
                        </div>
                        <div class="custom-control custom-radio">
                         <input type="radio" @if(old('type') == 'penyewa') checked @endif class="custom-control-input" id="penyewa" value="penyewa" name="type" required>
                         <label class="custom-control-label" for="penyewa">Penyewa</label>
                       </div>

                         <!-- <label>
                             <input class="checkbox" name="rememberme" value="" type="checkbox">
                             <span>Remember me</span>
                         </label> -->
                         <button class="shop-btn submit-btn">Daftar</button>
                         <p class="lost-pass"><a href="{{url('password/reset')}}">Lupa password?</a></p>
                         <p class="lost-pass"><a href="{{route('login')}}">Sudah punya akun ?</a></p>

                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
 @endsection
