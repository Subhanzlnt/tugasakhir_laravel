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
    <h4 class="card-title">Data Penyewa</h4>
    <!-- <div class="text-right mb-4">
      <button type="button" class="btn btn-primary" data-target="#tambah" data-toggle="modal"> Tambah</button>
    </div> -->
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>No Telepon</th>
                  <th>Alamat</th>
              </tr>
            </thead>
            <tbody>
              @php($no = 1)
              @foreach($users as $user)
              <tr>
                  <td>{{$no}}</td>
                  <td>{{$user->nama}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->telp}}</td>
                  <td>{{$user->alamat}}</td>
              </tr>
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
