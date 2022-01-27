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
    <h4 class="card-title">Data Paketan</h4>
    <div class="text-right mb-4">
      <button type="button" class="btn btn-primary" onclick="window.location='{{route("admin.paket.tambah")}}'" data-target="#tambah" data-toggle="modal"> Tambah</button>
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
              @php $no = 1;@endphp
              @foreach($alats as $alat)
              <tr>
                <td>{{$no++}}</td>
                <td>{{$alat->nama}}</td>
                <td>{{$alat->kategori->nama}}</td>
                <td>{{$alat->keterangan}}</td>
                <td>{{number_format($alat->harga,0,',','.')}}</td>
                <td>{{$alat->stok}}</td>
                <td> <img width="100px" height="100px" src="{{asset('images/'.$alat->gambar)}}" alt=""> </td>
                <td width="14%">
                  <button onclick="window.location='{{route("admin.paket.edit",[$alat->id,$alat->slug])}}'" class="btn btn-warning btn-lg text-white"> <i class="fa fa-pencil"></i> </button>
                  <button class="btn btn-danger btn-lg text-white" data-target="#hapus{{$alat->id}}" data-toggle="modal"> <i class="fa fa-trash"></i> </button>
                </td>
              </tr>
              @endforeach
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
