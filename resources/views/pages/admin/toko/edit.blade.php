@extends('templates.admin.default')
@section('content')
<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
     <div class="card">
       <div class="card-body">
         <h4 class="card-title">Data Toko</h4>
         <form class="forms-sample" action="{{route('admin.toko.update')}}" method="post" enctype="multipart/form-data">
           @csrf
           @method('patch')
           <div class="form-group">
             <label for="exampleInputUsername1">Nama Toko</label>
             <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama',$toko->nama)}}" placeholder="Masukan nama toko" required autofocus>
             @error('nama')
            <span class="invalid-feedback" role="alert">
             <strong>@if($message == 'validation.regex')
               Masukan nama dengan benar
               @elseif($message == 'validation.min.string')
               Nama terlalu pendek
               @else
               Nama terlalu panjang
               @endif
             </strong>
             @enderror
           </span>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail1">Keterangan</label>
            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="8" cols="80" placeholder="Masukan Keterangan" required>{{old('keterangan',$toko->keterangan)}}</textarea>
            @error('keterangan')
           <span class="invalid-feedback" role="alert">
            <strong>@if($message == 'validation.regex')
              Keterangan tidak boleh menggunakan tanda baca
              @elseif($message == 'validation.min.string')
              Keterangan terlalu pendek
              @else
              Keterangan terlalu panjang
              @endif
            </strong>
            @enderror
           </div>
           <div class="row">
             <div class="d-flex justify-content-start align-items-start mb-3">
                 <div class="col-4 form-group">
                     <img src="{{ asset('images/'.$toko->foto_toko) }}" alt="sample" class="rounded mw-100"/>
                     <p class="text-info mt-3">Gambar sebelumnya</p>
                 </div>
             </div>
            <div class="form-group col-6">
              <label>Foto Toko</label>
              <input type="file" name="foto_toko" class="file-upload-default">
              <div class="input-group col-xs-12">
                <input type="text" value="" class="form-control file-upload-info @error('foto_toko') is-invalid @enderror" disabled placeholder="Pilih Gambar">
                <span class="input-group-append">
                  <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                </span>
                @error('foto_toko')
               <span class="invalid-feedback" role="alert">
                <strong>
                  @if($message == 'validation.image')
                    Gambar harus jpg,jpeg dan png
                    @else
                    Gambar maksimal 2MB
                    @endif
                </strong>
                @enderror
              </div>
            </div>
          </div>
           <button type="submit" class="btn btn-primary mr-2">Simpan</button>
         </form>
       </div>
     </div>
   </div>
 </div>
@endsection
