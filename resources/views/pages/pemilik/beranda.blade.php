@extends('templates.admin.default')
@section('content')
<div class="row">
  <div class="col-md-6 col-lg-3 grid-margin stretch-card">
    <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
      <div class="card-body">
        <h6 class="font-weight-normal">Total Alat</h6>
        <h2 class="mb-0">{{count($alats)}}</h2>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3 grid-margin stretch-card">
    <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
      <div class="card-body">
        <h6 class="font-weight-normal">Total Paketan</h6>
        <h2 class="mb-0">{{count($pakets)}}</h2>
      </div>
    </div>
  </div>
  <!-- <div class="col-md-6 col-lg-3 grid-margin stretch-card">
    <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
      <div class="card-body">
        <h6 class="font-weight-normal">Total pemesanan</h6>
        <h2 class="mb-0">28893</h2>
      </div>
    </div>
  </div>
  <div class="col-md-6 col-lg-3 grid-margin stretch-card">
    <div class="card bg-gradient-info text-white text-center card-shadow-info">
      <div class="card-body">
        <h6 class="font-weight-normal">Total Pembayaran</h6>
        <h2 class="mb-0">28893</h2>
      </div>
    </div>
  </div> -->
</div>
@endsection
