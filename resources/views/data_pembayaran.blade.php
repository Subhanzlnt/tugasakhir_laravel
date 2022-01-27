@extends('templates.user.default')

@section('content')
<hr>
<div class="wishlist-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                      @if(Session::has('success'))
                      <div class="alert alert-success" role="alert">
                        {{Session::get('success')}}
                      </div>
                      @endif
                    @error('bukti')
                      <div class="alert alert-danger" role="alert">
                        @if($message == 'validation.required')
                        Bukti pembayaran tidak boleh kosong
                        @elseif($message == 'validation.uploaded')
                        Bukti pembayaran harus gambar maksimal 2MB
                        @else
                        Bukti pembayaran harus gambar
                        @endif
                      </div>
                      @enderror
                        <div class="table-content table-responsive">
                            <table class="table table-style-2 wishlist-table text-center">
                                <thead>
                                    <tr>
                                        <th>No Transaksi</th>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Nama Toko</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($pembayarans as $pembayaran)
                                    <tr>
                                        <td>{{$pembayaran->no_transaksi}}</td>
                                        <td>{{$pembayaran->alat->nama}}</td>
                                        <td>{{$pembayaran->qty}}</td>
                                        <td>Rp. {{number_format($pembayaran->alat->harga,0,',','.')}}</td>
                                        <td>Rp. {{number_format($pembayaran->total,0,',','.')}}</td>
                                        <td>{{$pembayaran->alat->owner->toko->nama}}</td>
                                        <td>
                                          @if($pembayaran->status == 0)
                                          Menunggu
                                          @elseif($pembayaran->status == 1)
                                          Diproses
                                          @elseif($pembayaran->status == 2)
                                          Dibayar
                                          @else
                                          Lunas
                                          @endif
                                        </td>
                                        <td>
                                          @if($pembayaran->status == 2 || $pembayaran->status == 1 || $pembayaran->status == 3)
                                          Selesai
                                          @else
                                            <a href="#" data-toggle="modal" data-target="#bukti{{$pembayaran->no_transaksi}}" class="shop-btn submit-btn">Upload Bukti</a>
                                            @endif
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="bukti{{$pembayaran->no_transaksi}}" tabindex="-1" role="dialog">
                                       <div class="modal-header">
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="dlicon ui-1_simple-remove"></i></button>
                                       </div>
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-body">
                                                   <div class="row">
                                                       <div class="col-6">
                                                           <div class="product-details-content quickview-content">
                                                             <h2 class="mb-2">Upload Bukti</h2>
                                                              <h3 class="mb-2">No Transaksi : {{$pembayaran->no_transaksi}}</h3>
                                                             <h3 class="mb-2">Keterangan</h2>
                                                               @foreach($pembayarans as $detail)
                                                               @if($detail->no_transaksi == $pembayaran->no_transaksi)
                                                               <h5 class="mb-2">{{$detail->alat->nama}} x {{$detail->qty}} Rp. {{number_format($detail->total,0,',','.')}}</h5>
                                                                @endif
                                                               @endforeach
                                                               @foreach($totals as $total)
                                                               @if($pembayaran->no_transaksi == $total->no_transaksi)
                                                               <h5 class="mb-5">Total : Rp. {{number_format($total->total_semua,0,',','.')}}</h5>
                                                               @endif
                                                               @endforeach
                                                               <h5 class="mb-2"><pre>Tanggal Pinjam  : {{$pembayaran->tgl_pinjam}}</pre></h5>
                                                               <h5 class="mb-2"><pre>Tanggal kembali : {{$pembayaran->tgl_kembali}}</pre></h5>

                                                               <form id="bukti-form{{$pembayaran->id}}" action="{{route('bukti.pembayaran', $pembayaran->no_transaksi)}}" method="post" class="mt-4" enctype="multipart/form-data">
                                                                 @csrf
                                                                     <label for="orderid">Bukti Pembayaran<span class="required"></span></label>
                                                                     <input type="file" class="form-control" style="border:none" name="bukti" required>
                                                                     <button type="submit" class="btn btn-primary text-black">Simpan</button>
                                                               </form>
                                                           </div>
                                                       </div>
                                                       <div class="col-lg-6 col-sm-12 col-xs-12">
                                                           <div class="product-details-tab">
                                                              <div class="product-details-content quickview-content">
                                                                <br>
                                                                <br><br>
                                                                 <h3 class="mb-4">Keterangan Pemilik</h3>
                                                                 <h4 class="mb-2"><pre>Nama Pemilik       : {{$pembayaran->alat->owner->nama}}</pre> </h4>
                                                                 <h4 class="mb-2"><pre>No Telepon Pemilik : {{$pembayaran->alat->owner->telp}}</pre></h4>
                                                                 <h4 class="mb-2"><pre>Nama Toko          : {{$pembayaran->alat->owner->toko->nama}}</pre></h4>
                                                                 <h4 class="mb-2"><pre>Keterangan Toko    : {{$pembayaran->alat->owner->toko->keterangan}}</pre></h4>
                                                                 <h4 class="mb-2"><pre>Alamat Toko        : {{$pembayaran->alat->owner->alamat}}</pre></h4>
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
