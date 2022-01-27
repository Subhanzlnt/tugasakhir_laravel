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

@if($toko == null)
<div class="row">
 <div class="col-12 grid-margin stretch-card">
   <div class="card">
     <div class="row">
       <div class="col-md-6">
         <div class="card-body">
           <div class="template-demo">
             <button type="button" onclick="window.location='{{route("pemilik.toko.tambah")}}'" class="btn btn-primary">Tambah Toko</button>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
@else
<div class="row">
		<div class="col-md-12 grid-margin grid-margin-md-0 stretch-card">
			<div class="card">
				<div class="card-body text-center">
          <div class="mb-4">
            <img width="600px" height="400px" src="{{asset('images/'.$toko->foto_toko)}}" alt="">
          </div>
					<div class="mb-4">
						<h4>{{$toko->nama}}</h4>
					</div>
          <p class="mt-4 card-text">
						{{$toko->keterangan}}
					</p>
					<button onclick="window.location='{{route("pemilik.toko.edit")}}'" class="btn btn-info btn-sm mt-3 mb-4">Edit</button>
				</div>
			</div>
		</div>
  </div>
@endif

@endsection
