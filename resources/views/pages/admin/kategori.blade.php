@extends('templates.admin.default')
@section('content')
@if(Session::has('success'))
<div class="alert alert-fill-success" role="alert">
   <i class="mdi mdi-check"></i>
  {{Session::get('success')}}
</div>
@elseif($errors->all())
<div class="alert alert-fill-danger" role="alert">
   <i class="mdi mdi-alert"></i>
   Gagal,Nama kategori tidak boleh angka atau simbol dan min 4
</div>
@endif
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Ketegori Alat</h4>
    <div class="text-right mb-4">
      <button type="button" class="btn btn-primary" data-target="#tambah" data-toggle="modal"> Tambah</button>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @php($no = 1)
              @foreach($kategoris as $kategori)
              <tr>
                  <td>{{$no}}</td>
                  <td width="75%">{{$kategori->nama}}</td>
                  <td width="14%">
                    <button class="btn btn-warning btn-lg text-white" data-target="#edit{{$kategori->id}}" data-toggle="modal"> <i class="fa fa-pencil"></i> </button>
                    <button class="btn btn-danger btn-lg text-white" data-target="#hapus{{$kategori->id}}" data-toggle="modal"> <i class="fa fa-trash"></i> </button>
                  </td>
              </tr>
              <!-- modal Edit -->
              <div class="modal fade" id="edit{{$kategori->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel-2">Edit Kategori</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form class="" action="{{route('admin.kategori.edit', $kategori)}}" method="post">
                          @csrf
                          @method('PATCH')
                          <div class="form-group">
                            <label for="">Nama Ketegori</label>
                            <input type="text" class="form-control" name="nama" value="{{$kategori->nama}}" required>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success text-white">Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Modal hapus -->
                <div class="modal fade" id="hapus{{$kategori->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel-2">Hapus Kategori</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form class="" action="{{route('admin.kategori.hapus', $kategori)}}" method="post">
                            @csrf
                            <p>Hapus kategori <strong>{{$kategori->nama}}</strong> </p>
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
<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel-2">Tambah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="{{route('admin.kategori.simpan')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="">Nama Ketegori</label>
              <input type="text" class="form-control" name="nama" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
            <button type="submit" class="btn btn-success text-white">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
