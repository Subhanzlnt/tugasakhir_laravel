@extends('templates.user.default')

@section('content')
<div class="checkout-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-95 pb-lg-75 pb-md-65 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="customer-zone mb-20">
                  @if($errors->has('telp'))
                  <div class="alert alert-danger" role="alert">
                    Gagal Melakukan Pembayaran
                  </div>
                  @endif
                </div>
                <form class="" action="{{route('pembayaran')}}" method="post" target="_blank">
                  @csrf
                  <div class="checkout-wrap">
                      <div class="row">
                          <div class="col-xl-7 col-lg-6">
                              <div class="billing-info-wrap mr-130">
                                  <h3>Detail Pemesanan</h3>
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
                              </div>
                          </div>
                          <div class="col-xl-5 col-lg-6">
                              <div class="your-order-area">
                                  <h3>Pesanan</h3>
                                  <div class="your-order-wrap gray-bg-4">
                                      <div class="your-order-info-wrap">
                                          <div class="your-order-info">
                                              <ul>
                                                  <li>Nama <span>Total</span></li>
                                              </ul>
                                          </div>
                                          <div class="your-order-middle">
                                              <ul>
                                                @foreach($keranjangs as $keranjang)
                                                  <li>{{$keranjang->alat->nama}}, {{number_format($keranjang->alat->harga,0,',','.')}} X {{$keranjang->qty}} <span>Rp. {{number_format($keranjang->total,0,',','.')}} </span></li>
                                                  <input type="hidden" name="id_alat[]" value="{{$keranjang->alat->id}}">
                                                  <input type="hidden" name="nama[]" value="{{$keranjang->alat->nama}}">
                                                  <input type="hidden" name="qty[]" value="{{$keranjang->qty}}">
                                                  <input type="hidden" name="total[]" value="{{$keranjang->total * $keranjang->durasi }}">
                                                  <input type="hidden" name="totals" value="{{$keranjang->total * $keranjang->durasi / $keranjang->qty }}">
                                                  {{-- <input type="hidden" name="total1" value="{{$keranjang->total}}"> --}}
                                                  <input type="hidden" name="id_alats" value="{{$keranjang->alat->id}}">
                                                  <input type="hidden" name="namas" value="{{$keranjang->alat->nama}}">
                                                  <input type="hidden" name="qtys" value="{{$keranjang->qty}}">
                                                  
                                                  @endforeach
                                              </ul>
                                          </div>

                                        <div class="your-order-info order-shipping">
                                              <ul>
                                                  <li>Tanggal Pinjam <p>{{date('d M Y', strtotime($keranjangs[0]->tgl_pinjam))}}</p>
                                                  <li>Tanggal Kembali <p>{{date('d M Y', strtotime($keranjangs[0]->tgl_kembali))}}</p>
                                                  <li>Durasi <p>{{$keranjangs[0]->durasi}} Hari</p>

                                                  </li>
                                              </ul>
                                          </div>
                                          <div class="your-order-info order-total">
                                              <ul>
                                                  <li>Total <span id="total_semua">Rp. {{number_format($keranjangs->sum('total')* $keranjang->durasi ,0,',','.')}}</span></li>
                                                  <input type="hidden" name="total" id="total" value="{{$keranjang->total * $keranjang->durasi }}">
                                                  <input type="hidden" id="total_awal" value="Rp. {{number_format($keranjang->sum('total'),0,',','.')}}">
                                                  {{-- <input type="hidden" name="subtotal" id="subtotal2"> --}}
                                                </ul>
                                          </div>
                                      </div>
                                        <input type="hidden" name="tgl_pinjam" value="{{date('d M Y', strtotime($keranjangs[0]->tgl_pinjam))}}">
                                        <input type="hidden" name="tgl_kembali" value="{{date('d M Y', strtotime($keranjangs[0]->tgl_kembali))}}">
                                        <input type="hidden" name="durasi" value="{{$keranjangs[0]->durasi}}">

                                      {{-- <div class="payment-method">
                                          <div class="pay-top sin-payment">
                                              <table class=" table">
                                                  <tr>
                                                      <th>Bank</th>
                                                      <th>No. Rekeing</th>
                                                  </tr>
                                                  <tr>
                                                      <td><img src="{{ asset('assets/user/img/bri.png')}}" alt="" width="70px"></td>
                                                      <td>12456 0 1256 777</td>
                                                  </tr>
                                                  <tr>
                                                    <td><img src="{{ asset('assets/user/img/bni.png')}}" alt="" width="70px"></td>
                                                      <td>12456 0 1256 500</td>
                                                  </tr>
                                                  <tr>
                                                      <td><img src="{{ asset('assets/user/img/mandiri.png')}}" alt="" width="70px"></td>
                                                      <td>12456 0 1256 332</td>
                                                  </tr>
                                                  <tr>
                                                        <td><img src="{{ asset('assets/user/img/bca.png')}}" alt="" width="70px"></td>
                                                      <td>12456 0 1256 112</td>
                                                  </tr>
                                              </table>
                                          </div>
                                      </div> --}}
                                  </div>
                                  <div class="Place-order mt-25">
                                    <button type="submit" class="checkout-btn">Pembayaran</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                </form>
            </div>
        </div>
@endsection
