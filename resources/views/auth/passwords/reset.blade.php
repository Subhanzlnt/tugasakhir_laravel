@extends('templates.user.default')
@section('content')
<hr>
<div class="cart-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row mb--96 mb-md--57">
          <div class="section mb-5">
            <div class="container">
       <div class="row">
           <div class="col-lg-12">
               <div class="my-account-form-area">
                 @if (session('status'))
                     <div class="alert alert-success" role="alert">
                         Berhasil, Cek email anda
                     </div>
                 @endif
                   <form action="{{ route('password.update') }}" method="post">
                     @csrf
                       <input type="hidden" name="token" value="{{ $token }}">
                       <h2>Ganti password</h2>
                       <div class="single-input">
                         <label for="orderid">Email <span class="required">*</span></label>
                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email">
                         @error('email')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                       </div>
                       <div class="single-input">
                         <label for="orderid">Password <span class="required">*</span></label>
                         <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" autofocus>
                         @error('password')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{$message}}
                                 </strong>
                             </span>
                         @enderror
                       </div>
                       <div class="single-input">
                         <label for="orderid">Ulangi Password <span class="required">*</span></label>
                         <input class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                       </div>
                       <div class="text-center">
                          <button class="shop-btn submit-btn">Kirim</button>
                       </div>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
</div>
</div>
</div>

@endsection
