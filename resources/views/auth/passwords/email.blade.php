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
                   <form action="{{ route('password.email') }}" method="post">
                     @csrf
                       <h2>Reset Password</h2>
                       <div class="single-input">
                         <label for="orderid">Email <span class="required">*</span></label>
                         <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                          @error('email')
                             <span style="color:red">
                                 <strong>Email tidak ditemukan</strong>
                             </span>
                         @enderror
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
