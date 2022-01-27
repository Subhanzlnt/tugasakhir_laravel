@extends('templates.admin.default')
@section('content')
@if(Session::has('success'))
<div class="alert alert-fill-success" role="alert">
   <i class="mdi mdi-check"></i>
  {{Session::get('success')}}
</div>
@endif
@error('bukti')
  <div class="alert alert-danger" role="alert">
    <i class="mdi mdi-alert"></i>
    @if($message == 'validation.required')
    Bukti pembayaran tidak boleh kosong
    @elseif($message == 'validation.uploaded')
    Bukti pembayaran harus gambar maksimal 2MB
    @else
    Bukti pembayaran harus gambar
    @endif
  </div>
  @enderror
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Pemesanan</h4>
    <!-- <div class="text-right mb-4">
      <button type="button" class="btn btn-primary" data-target="#tambah" data-toggle="modal"> Tambah</button>
    </div> -->
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                <th>No.</th>
                <th>No Transaksi</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Durasi</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Nama</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php $no = 1;@endphp
              @foreach($pembayarans as $pembayaran)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$pembayaran->no_transaksi}}</td>
                <td>{{$pembayaran->alat->nama}}</td>
                <td width="2%">{{$pembayaran->qty}}</td>
                <td width="2%">{{$pembayaran->durasi}}</td>
                <td width="30%">Rp. {{number_format($pembayaran->alat->harga,0,',','.')}}</td>
                <td>Rp. {{number_format($pembayaran->total,0,',','.')}}</td>
                <td>{{$pembayaran->user->nama}}</td>
                <td>{{$pembayaran->tgl_pinjam}}</td>
                <td>{{$pembayaran->tgl_kembali}}</td>
                <td>
                  @if($pembayaran->status == 0)
                  Menunggu
                  @elseif($pembayaran->status == 1)
                  Diproses
                  @elseif($pembayaran->status == 2)
                  Disewa
                  @else
                  Selesai
                  @endif
                </td>
                <td>
                  <button type="button" data-toggle="modal" data-target="#detail{{$pembayaran->no_transaksi}}" class="btn btn-primary">Detail</button>
                  @if($pembayaran->status == 1)
                  <button type="button" data-toggle="modal" data-target="#bukti{{$pembayaran->no_transaksi}}" class="btn btn-info">Setujui Pemesanan</button>
                  @elseif($pembayaran->status == 2)
                  <button type="button" data-toggle="modal" data-target="#pengembalian{{$pembayaran->no_transaksi}}" class="btn btn-info">Pengembalian</button>
                  @else

                  @endif
                </td>
              </tr>
              <div class="modal fade" id="detail{{$pembayaran->no_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Detail Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                          <p> <pre> No Transaksi : {{$pembayaran->no_transaksi}}</pre></p>
                          <p> <pre> Nama         : {{$pembayaran->user->nama}}</pre></p>
                          <p> <pre> No Telepon   : {{$pembayaran->user->telp}}</pre></p>
                          <p> <pre> Alamat       : {{$pembayaran->user->alamat}}</pre></p>
                           @foreach($totals as $total)
                          @if($pembayaran->no_transaksi == $total->no_transaksi)
                          <p> <pre> Total        : Rp. {{number_format($total->total_semua,0,',','.')}}</pre></p>
                          @endif
                          @endforeach
                          {{-- <p> <pre> Bukti Pembayaran : </pre></p>

                          <pre><img width="415px" height="500px" src="{{asset('images/'.$pembayaran->bukti_user)}}" alt=""></pre> --}}
                        </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="bukti{{$pembayaran->no_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">Bukti Pembayaran</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="" action="{{route('admin.bukti.pemesanan', $pembayaran->no_transaksi)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <p> <pre> No Transaksi : {{$pembayaran->no_transaksi}}</pre></p>
                            <p> <pre> Nama         : {{$pembayaran->user->nama}}</pre></p>
                          <p> <pre> No Telepon   : {{$pembayaran->user->telp}}</pre></p>
                          <p> <pre> Alamat       : {{$pembayaran->user->alamat}}</pre></p>
                           @foreach($totals as $total)
                           @if($pembayaran->no_transaksi == $total->no_transaksi)
                           <p> <pre> Total         : Rp. {{number_format($total->total_semua,0,',','.')}}</pre></p>
                           @endif
                           @endforeach
                           {{-- <p> <pre> Bukti Pembayaran : </pre></p>

                          <pre><img width="415px" height="500px" src="{{asset('images/'.$pembayaran->bukti_user)}}" alt=""></pre> --}}
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary text-white">Setujui</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="pengembalian{{$pembayaran->no_transaksi}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">Detail Pengembalian</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="" action="{{route('admin.bukti.pengembalian', $pembayaran->no_transaksi)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <p> <pre> No Transaksi : {{$pembayaran->no_transaksi}}</pre></p>
                            <p> <pre> Nama         : {{$pembayaran->user->nama}}</pre></p>
                            <p> <pre> No Telepon   : {{$pembayaran->user->telp}}</pre></p>
                            <p> <pre> Alamat       : {{$pembayaran->user->alamat}}</pre></p>
                             @foreach($totals as $total)
                            @if($pembayaran->no_transaksi == $total->no_transaksi)
                            <p> <pre> Total        : Rp. {{number_format($total->total_semua,0,',','.')}}</pre></p>
                            @endif
                            @endforeach
                            {{-- <p> <pre> Bukti Pembayaran : </pre></p>
  
                            <pre><img width="415px" height="500px" src="{{asset('images/'.$pembayaran->bukti_user)}}" alt=""></pre> --}}
                            <p> <pre> Denda        : <input type="text" class="form-control" style="border:none" name="denda"></pre></p>
                            <p> <pre> Keterangan        : <input type="text" class="form-control" style="border:none" name="keterangan"></pre></p>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary text-white">Setujui</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
              @endforeach
              @php($no++)
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
