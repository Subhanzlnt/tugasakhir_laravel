  @extends('templates.user.default')

@section('content')
<div class="checkout-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-95 pb-lg-75 pb-md-65 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="customer-zone mb-20">
                  @if($errors->has('telp') || $errors->has('alamat'))
                  <div class="alert alert-danger" role="alert">
                    Gagal Melakukan update profil
                  </div>
                  @elseif(Session::has('success'))
                  <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                  </div>
                  @elseif($errors->has('password'))
                  <div class="alert alert-danger" role="alert">
                    Gagal Melakukan ganti password
                  </div>
                  @endif
                </div>

                  <div class="checkout-wrap">
                      <div class="row">
                          <div class="col-xl-7 col-lg-6">
                            <form class="" action="{{route('update.profile')}}" method="post">
                              @csrf
                              <div class="billing-info-wrap mr-130">
                                  <h3>Profil</h3>
                                  <div class="row">
                                      <div class="col-lg-12 col-md-12">
                                          <div class="billing-info mb-20">
                                              <label>Nama<abbr class="required" title="required">*</abbr></label>
                                              <input type="text" name="nama" value="{{Auth::user()->nama}}" disabled>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="billing-info mb-20">
                                              <label>Email <abbr class="required" title="required">*</abbr></label>
                                              <input type="email" name="email" value="{{Auth::user()->email}}" disabled>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="billing-info mb-20">
                                              <label>No Telepon <abbr class="required" title="required">*</abbr></label>
                                              <input type="text" value="{{old('telp', Auth::user()->telp)}}" id="telp" onkeypress="validate(event)" name="telp" maxlength=13 required>
                                                @error('telp')
                                                  <span style="color:red" role="alert">
                                                      <strong>
                                                        @if($message == 'validation.digits_between')
                                                        Nomor telepon tidak benar
                                                        @elseif($message == 'validation.numeric')
                                                        Nomor telepon tidak benar
                                                        @else
                                                        Nomor telepon telah digunakan
                                                        @endif
                                                      </strong>
                                                  </span>
                                                  @enderror
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="billing-info additional-info-wrap">
                                          <label>Alamat <abbr class="required" title="required">*</abbr></label>
                                          <textarea name="alamat">{{old('alamat', Auth::user()->alamat)}}</textarea>
                                          @error('alamat')
                                            <span style="color:red" role="alert">
                                                <strong>
                                                  @if($message == 'validation.min.string')
                                                  Masukan Alamat secara lengkap
                                                  @endif
                                                </strong>
                                            </span>
                                            @enderror
                                        </div>
                                      </div>
                                  </div>
                                  <div class="Place-order mt-25">
                                    <button type="submit" class="checkout-btn">simpan</button>
                                  </div>
                              </div>
                              </form>
                          </div>
                          <div class="col-xl-5 col-lg-6">
                            <form class="" action="{{route('update.password')}}" method="post">
                              @csrf
                              @method('PATCH')
                              <div class="your-order-area">
                                  <h3>Ganti Password</h3>
                                  <div class="your-order-wrap gray-bg-4">
                                    <div class="single-input">
                                        <label for="orderid">Password <span class="required"></span></label>
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
                                        <label for="orderid">Konfirmasi Password <span class="required"></span></label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password" autocomplete="new-password" required>
                                    </div>
                                  </div>
                                  <div class="Place-order mt-25">
                                    <button type="submit" class="checkout-btn">simpan</button>
                                  </div>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
            </div>
        </div>

@endsection
