@extends('templates.admin.default')
@section('content')
@if(Session::has('success'))
<div class="alert alert-fill-success" role="alert">
   <i class="mdi mdi-check"></i>
  {{Session::get('success')}}
</div>
@elseif(Session::has('error'))
<div class="alert alert-fill-danger" role="alert">
   <i class="mdi mdi-alert"></i>
  {{Session::get('error')}}
</div>
@endif
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Data Alat</h4>
    <div class="text-right mb-4">
      <button type="button" class="btn btn-primary" onclick="window.location='{{route("pemilik.alat.tambah")}}'"> Tambah</button>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Keterangan</th>
                  <th>Harga</th>
                  <th>Stok</th>
                  <th>Gambar</th>
                  <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php($no = 1)
              @foreach($alats as $alat)
              <tr>
                  <td>{{$no}}</td>
                  <td>{{$alat->nama}}</td>
                  <td>{{$alat->kategori->nama}}</td>
                  <td>{{$alat->keterangan}}</td>
                  <td>{{number_format($alat->harga,0,',','.')}}</td>
                  <td>{{$alat->stok}}</td>
                  <td> <img width="100px" height="100px" src="{{asset('images/'.$alat->gambar)}}" alt=""> </td>
                  <td width="14%">
                    <button onclick="window.location='{{route("pemilik.alat.edit",[$alat->id,$alat->slug])}}'" class="btn btn-warning btn-lg text-white"> <i class="fa fa-pencil"></i> </button>
                    <button class="btn btn-danger btn-lg text-white" data-target="#hapus{{$alat->id}}" data-toggle="modal"> <i class="fa fa-trash"></i> </button>
                  </td>
              </tr>
              <div class="modal fade" id="hapus{{$alat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Hapus Alat</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="" action="{{route('pemilik.alat.hapus', $alat)}}" method="post">
                          @csrf
                          <p>Hapus Alat <strong>{{$alat->nama}}</strong> </p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-danger text-white">Hapus</button>
                        </div>
                        </form>
                    </div>
                  </div>
                </div>
              @php($no++)
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
