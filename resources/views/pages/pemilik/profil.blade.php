@extends('templates.admin.default')
@section('content')
@if(Session::has('success'))
<div class="alert alert-fill-success" role="alert">
  <i class="mdi mdi-check"></i>
  {{Session::get('success')}}
</div>
@elseif($errors->has('password'))
<div class="alert alert-fill-danger" role="alert">
  <i class="mdi mdi-alert"></i>
  Gagal ganti password
</div>
@elseif($errors->all())
<div class="alert alert-fill-danger" role="alert">
  <i class="mdi mdi-alert"></i>
  Gagal merubah profil
</div>
@endif
<div class="row">
           <div class="col-md-7 grid-margin stretch-card">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Profil</h4>
                 <form class="forms-sample" action="{{route('pemilik.profil.update')}}" method="post" enctype="multipart/form-data">
                   @csrf
                   @method('PATCH')
                    <div class="form-group">
                      <div class="d-flex justify-content-start align-items-start">
                          <div class="col-4 form-group">
                              <label>Foto</label>
                              <img src="{{ asset('images/'.Auth::user()->foto) }}" alt="sample" class="rounded mw-100"/>
                          </div>
                      </div>
                      <input type="file" name="foto" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" value="" class="form-control file-upload-info @error('foto') is-invalid @enderror" disabled placeholder="Pilih Gambar">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        @error('foto')
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

                   <div class="form-group">
                     <label for="exampleInputUsername1">Nama</label>
                     <input type="text" name="nama" value="{{old('nama', Auth::user()->nama)}}" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukan nama" required>
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
                     <label for="exampleInputEmail1">Email</label>
                     <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email', Auth::user()->email)}}" placeholder="masukan email" required>
                     @error('email')
                         <span class="invalid-feedback" role="alert">
                             <strong>Email sudah ada</strong>
                         </span>
                     @enderror
                   </div>
                   <div class="form-group">
                     <label for="exampleInputUsername1">Username</label>
                     <input type="text" name="username" value="{{old('username', Auth::user()->username)}}" class="form-control @error('username') is-invalid @enderror" placeholder="Masukan nama" required>
                     @error('username')
                         <span class="invalid-feedback" role="alert">
                             <strong>
                               @if($message == 'validation.alpha_dash')
                               Penghubung username hanya boleh menggunaka underscore
                               @else
                               Username terlalu pendek
                               @endif

                             </strong>
                         </span>
                     @enderror
                   </div>
                   <div class="form-group">
                     <label for="exampleInputUsername1">No Telepon</label>
                     <input type="text" name="telp" maxlength="13" value="{{old('telp', Auth::user()->telp)}}" class="form-control @error('telp') is-invalid @enderror" placeholder="Masukan no telepon" required>
                     @error('telp')
                         <span class="invalid-feedback" role="alert">
                           <strong>  @if($message == 'validation.digits_between')
                             Nomor telepon tidak benar
                             @elseif($message == 'validation.numeric')
                             Nomor telepon tidak benar
                             @else
                             Nomor telepon telah digunakan
                             @endif
                           </strong>
                         </span>
                     @enderror
                   </div>
                   <div class="form-group">
                     <label for="exampleInputUsername1">No Rekening</label>
                     <input type="text" maxlength="16" name="no_rek" value="{{old('no_rek', Auth::user()->no_rek)}}" class="form-control @error('no_rek') is-invalid @enderror" placeholder="Masukan no rekening" required>
                     @error('no_rek')
                         <span class="invalid-feedback" role="alert">
                           <strong>@if($message == 'validation.numeric')
                             Masukan no rekening dengan benar
                             @else
                             No rekening terlalu pendek
                             @endif
                           </strong>
                         </span>
                     @enderror
                   </div>
                   <div class="form-group">
                     <label for="exampleInputUsername1">Bank</label>
                     <select class="form-control" name="bank">
                       <option value="BRI" {{old('bank') == 'BRI' ? 'selected' : ''}}
                         @if(Auth::user()->bank === 'BRI') selected @endif>BRI</option>
                       <option value="BNI" {{old('bank') == 'BNI' ? 'selected' : ''}}
                         @if(Auth::user()->bank === 'BNI') selected @endif>BNI</option>
                       <option value="BCA" {{old('bank') == 'BCA' ? 'selected' : ''}}
                         @if(Auth::user()->bank === 'BCA') selected @endif>BCA</option>
                       <option value="Mandiri" {{old('bank') == 'BRI' ? 'selected' : ''}}
                         @if(Auth::user()->bank === 'Mandiri') selected @endif>Mandiri</option>
                     </select>
                   </div>
                   <div class="form-group">
                     <label for="exampleInputUsername1">Alamat</label>
                     <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" rows="8" cols="80" required>{{old('alamat',Auth::user()->alamat)}}</textarea>
                     @error('alamat')
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

                   <button type="submit" class="btn btn-primary mr-2" required>Simpan</button>
                 </form>
               </div>
             </div>
           </div>
           <div class="col-md-5">
             <div class="card">
               <div class="card-body">
                 <h4 class="card-title">Ganti Password</h4>
                 <form class="forms-sample" method="post" action="{{route('pemilik.password.update')}}">
                   @csrf
                   <div class="form-group">
                     <label for="exampleInputPassword1">Password</label>
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Masukan password" autocomplete="new-password" required>
                     @error('password')
                         <span class="invalid-feedback" role="alert">
                             <strong>@if($message == 'validation.min.string')
                               Password terlalu pendek
                               @else
                               Password tidak sama
                               @endif
                             </strong>
                         </span>
                     @enderror
                   </div>
                   <div class="form-group">
                     <label for="exampleInputConfirmPassword1">Ulangi password</label>
                     <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Ulangi Password" autocomplete="new-password" required>
                   </div>
                   <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                 </form>
               </div>
             </div>
           </div>

@endsection
