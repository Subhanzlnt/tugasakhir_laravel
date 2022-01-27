@extends('templates.admin.default')
@section('content')
<!-- @if(Session::has('success'))
<div class="alert alert-fill-success" role="alert">
   <i class="mdi mdi-check"></i>
  {{Session::get('success')}}
</div>
@endif -->
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
                <th>No Transaksi</th>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Total</th>
                <th>Nama Peminjam</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php($no = 1)
              @foreach($pembayarans as $pembayaran)
              @if($pembayaran->alat->id_pemilik == Auth::user()->id)
              <tr>
                <td>{{$pembayaran->no_transaksi}}</td>
                <td>{{$pembayaran->alat->nama}}</td>
                <td>{{$pembayaran->alat->tipe}}</td>
                <td>{{$pembayaran->qty}}</td>
                <td>Rp. {{number_format($pembayaran->alat->harga,0,',','.')}}</td>
                <td>Rp. {{number_format($pembayaran->total,0,',','.')}}</td>
                <td>{{$pembayaran->user->nama}}</td>
                <td>
                  @if($pembayaran->status == 0)
                  Menunggu
                  @elseif($pembayaran->status == 1)
                  Diproses
                  @else
                  Dibayar
                  @endif
                </td>
                  <td>
                    <button type="button" data-toggle="modal" data-target="#detail{{$pembayaran->no_transaksi}}" class="btn btn-primary">Detail</button>
                  </td>
              </tr>
              @endif
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
                          <p> <pre> No Transaksi    : {{$pembayaran->no_transaksi}}</pre></p>
                          <p> <pre> Nama            : {{$pembayaran->user->nama}}</pre></p>
                          <p> <pre> No Telepon      : {{$pembayaran->user->telp}}</pre></p>
                          <p> <pre> Alamat          : {{$pembayaran->user->alamat}}</pre></p>
                          <p> <pre> Tanggal Pinjam  : {{$pembayaran->tgl_pinjam}}</pre></p>
                          <p> <pre> Tanggal Kembali : {{$pembayaran->tgl_kembali}}</pre></p>
                          <p> <pre> Durasi          : {{$pembayaran->durasi}} Hari</pre></p>

                           @foreach($totals as $total)
                          @if($pembayaran->no_transaksi == $total->no_transaksi)
                          <p> <pre> Total           : Rp. {{number_format($total->total_semua,0,',','.')}}</pre></p>
                          @endif
                          @endforeach
                          <p> <pre> Bukti Pembayaran : </pre></p>
                          @if($pembayaran->bukti_admin == null)
                            <p> <pre> Belum ada bukti pembayaran </pre></p>
                          @else
                          <pre><img width="415px" height="500px" src="{{asset('images/'.$pembayaran->bukti_admin)}}" alt=""></pre>
                          @endif
                        </div>
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
