@extends('templates.user.default')

@section('content')
        <div class="checkout-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-95 pb-lg-75 pb-md-65 pb-sm-60 pb-xs-50">
            <div class="container">
                {{-- <div class="customer-zone mb-20">
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
                </div> --}}
                  <div class="checkout-wrap">
                      <div class="row">
                          <div class="col-xl-12 col-lg-6">
                            <form class="" action="{{route('member.update')}}" method="post">
                              @csrf
                              <div class="billing-info-wrap mr-130">
                                  <h3>Profil</h3>
                                  <div class="row">
                                      <div class="col-lg-12 col-md-12">
                                          <div class="billing-info mb-20">
                                              <label>Nama</label>
                                              <input type="text" name="nama" value="{{Auth::user()->nama}}" disabled>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="billing-info mb-20">
                                              <label>Email </label>
                                              <input type="email" name="email" value="{{Auth::user()->email}}" disabled>
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class="billing-info mb-20">
                                              <label>No Telepon </label>
                                              <input type="text" value="{{old('telp', Auth::user()->telp)}}" id="telp" onkeypress="validate(event)" name="telp" maxlength=13 disabled>
                                                {{-- @error('telp')
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
                                                  @enderror --}}
                                          </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="billing-info additional-info-wrap">
                                          <label>Alamat </label>
                                          <textarea name="alamat" disabled>{{old('alamat', Auth::user()->alamat)}}</textarea>
                                          {{-- @error('alamat')
                                            <span style="color:red" role="alert">
                                                <strong>
                                                  @if($message == 'validation.min.string')
                                                  Masukan Alamat secara lengkap
                                                  @endif
                                                </strong>
                                            </span>
                                            @enderror --}}
                                        </div>
                                      </div>
                                  </div>
                                  <div class="Place-order mt-25">
                                    <button type="submit" class="checkout-btn">Daftar Member</button>
                                  </div>
                              </div>
                              </form>
                          </div>
                      </div>
                  </div>
            </div>
        </div>

@endsection
