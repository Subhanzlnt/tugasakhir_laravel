@extends('templates.admin.default')
@section('content')
<div class="row">
   <div class="col-md-12 grid-margin stretch-card">
     <div class="card">
       <div class="card-body">
         <h4 class="card-title">Edit Paket</h4>
         <form class="forms-sample" action="{{route('admin.paket.update',$alat)}}" method="post" enctype="multipart/form-data">
           @csrf
           @method('PATCH')
           <div class="form-group">
             <label for="exampleInputUsername1">Nama Alat</label>
             <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{old('nama', $alat->nama)}}" placeholder="Masukan nama alat" required autofocus>
             @error('nama')
                 <span class="invalid-feedback" role="alert">
                     <strong>@if($message == 'validation.regex')
                       Masukan nama dengan benar
                       @else
                       Nama terlalu pendek
                       @endif
                     </strong>
                 </span>
             @enderror
           </div>
           <div class="form-group">
             <label for="exampleInputUsername1">Kategori</label>
             <select name="id_kategori" class="form-control" id="exampleSelectGender">
               @foreach($kategoris as $kategori)
                <option value="{{$kategori->id}}" {{old('id_kategori') == $kategori->id ? 'selected' : ''}}
                  @if($kategori->id == $alat->id_kategori) selected @endif
                  >{{$kategori->nama}}</option>
                @endforeach
              </select>
           </div>
           <div class="form-group">
             <label for="exampleInputEmail1">Keterangan</label>
            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="8" cols="80">{{old('keterangan', $alat->keterangan)}}</textarea>
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
             <div class="form-group col-6">
               <label for="exampleInputUsername1">Harga/Hari</label>
               <input type="text" class="form-control @if(Session::has('error')) is-invalid @endif" id="price" name="harga" value="{{old('harga',number_format($alat->harga,0,',','.'))}}" placeholder="Masukan harga" required autofocus>
               @if(Session::has('error'))
              <span class="invalid-feedback" role="alert">
               <strong>{{Session::get('error')}}
               </strong>
               @endif
             </div>
             <div class="form-group">
               <label for="exampleInputUsername1">stok</label>
               <input type="number" class="form-control  @if(Session::has('errorStok')) is-invalid @endif" id="price" name="stok" value="{{old('stok', $alat->stok)}}" placeholder="Masukan harga" required autofocus>
               @if(Session::has('errorStok'))
              <span class="invalid-feedback" role="alert">
               <strong>{{Session::get('errorStok')}}
               </strong>
               @endif
             </div>
           </div>
           <div class="row">
             <div class="d-flex justify-content-start align-items-start">
                 <div class="col-4 form-group">
                     <img src="{{ asset('images/'.$alat->gambar) }}" alt="sample" class="rounded mw-100"/>
                     <p class="text-info mt-3">Gambar sebelumnya</p>
                 </div>
             </div>
             <div class="form-group col-6">
               <label>Gambar</label>
               <input type="file" name="gambar" class="file-upload-default">
               <div class="input-group col-xs-12">
                 <input type="text" value="{{old('image')}}" class="form-control file-upload-info @error('gambar') is-invalid @enderror" disabled placeholder="Pilih Gambar">
                 <span class="input-group-append">
                   <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                 </span>
                 @error('gambar')
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
