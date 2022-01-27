@extends('templates.user.default')

@section('content')
<div class="col-12">
  @if(Session::has('success'))
  <div class="alert alert-success" role="alert">
    {{Session::get('success')}}
  </div>
  @elseif(Session::has('error'))
  <div class="alert alert-danger" role="alert">
    {{Session::get('error')}}
  </div>
  @endif
</div>
<div class="product-details-area section border-top pt-80 pt-lg-60 pt-md-50 pt-sm-45 pt-xs-25  pb-55 pb-lg-15 pb-md-5 pb-sm-0 pb-xs-0">
            <div class="container-fluid pl-80 pl-lg-15 pl-md-15 pl-sm-15 pl-xs-15  pr-80 pr-lg-15 pr-md-15 pr-sm-15 pr-xs-15">
                <div class="row row-30">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-tab">
                            <div class="product-tabs pro-dec-big-img-slider">
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <div class="product-label">
                                          @if($alat->created_at->format('d M Y') == now()->format('d M Y'))
                                            <span class="sale">Baru</span>
                                            @endif
                                        </div>
                                            <img src="{{asset('images/'.$alat->gambar)}}" alt="">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="product-details-content quickview-content">
                            <h2>{{$alat->nama}}</h2>
                            <div class="product-rating-stock">
                                <div class="product-dec-rating-reviews">
                                    <!-- <div class="product-dec-rating">
                                        <i class="fa fa-star"></i>
                                    </div> -->
                                </div>
                                @if($alat->stok > 0)
                               <div class="pro-stock">
                                   <span><i class="dlicon ui-1_check-circle-08"></i>Stok ada {{$alat->stok}}</span>
                               </div>
                                @endif
                            </div>
                            <p class="product-price product-details-price"><span class="discounted-price">Rp. {{number_format($alat->harga,0,',','.')}} /Hari</span></p>
                            <p class="fz-16">{{$alat->keterangan}}</p>
                             @if($alat->stok < 1)
                          <h3 class="mt-3">Stok Kosong</h3>
                            @else
                            <form id="keranjang-form" class="" action="{{route('keranjang.tambah', $alat)}}" method="post">
                              @csrf
                            <div class="pro-details-quality">
                              <div class="quantity quantity--2" id="quantity2">
                                <input type="text" class="quantity-input" name="qty" id="qty2" value="1" disabled style="background-color:transparent">
                                <div class="dec qtybutton">-</div>
                                <div class="inc qtybutton">+</div>
                                <span id='stok_alat' style="display:none">{{$alat->stok}}</span>
                                  <input type="hidden" id="qty3" name="qty" value="1">
                                </div>
                                <div class="pro-details-cart btn-hover">
                                   <a onclick="document.getElementById('keranjang-form').submit(); return false;">Tambah ke keranjang</a>
                                </div>
                            </div>
                            </form>
                            @endif
                            <div class="pro-details-sku">
                              <span>Tipe: {{$alat->tipe}}</span>
                            </div>
                            <div class="pro-details-meta">
                                <span>Kategori : </span>
                                <ul>
                                    <li><a href="#">{{$alat->kategori->nama}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Details Area End -->
        <!-- Product Description Start -->
        <div class="product-description section pb-55 pb-lg-35 pb-md-20 pb-sm-15 pb-xs-10">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="description-nav">
                            <ul class="nav">
                                <li><a class="active show" href="#description" data-toggle="tab">Deskripsi</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <div id="description" class="single-product-tab tab-pane fade active show">
                                <div class="row row-40">
                                    <div class="col-lg-7 order-2">
                                        <div class="decription-content">
                                            <ul class="list-container custom-color__icon with__dot">
                                                <li class="list-items with-spacebetween">
                                                    <span class="list-icon"><i class="fa fa-circle"></i></span>
                                                    <span class="list-text">Nama toko : {{$alat->owner->toko->nama}}</span>
                                                </li>
                                                <li class="list-items with-spacebetween">
                                                    <span class="list-icon"><i class="fa fa-circle"></i></span>
                                                    <span class="list-text">Pemilik : {{$alat->owner->nama}} </span>
                                                </li>
                                                <li class="list-items with-spacebetween">
                                                    <span class="list-icon"><i class="fa fa-circle"></i></span>
                                                    <span class="list-text">No Telepon : {{$alat->owner->telp}} </span>
                                                </li>
                                                <li class="list-items with-spacebetween">
                                                    <span class="list-icon"><i class="fa fa-circle"></i></span>
                                                    <span class="list-text">Alamat : {{$alat->owner->alamat}} </span>
                                                </li>
                                                <li class="list-items with-spacebetween">
                                                    <span class="list-icon"><i class="fa fa-circle"></i></span>
                                                    <span class="list-text">keterangan Toko : {{$alat->owner->toko->keterangan}} </span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 order-1">
                                        <div class="banner mb-30">
                                            <img src="{{asset('images/'.$alat->owner->toko->foto_toko)}}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product Description End -->


@endsection
