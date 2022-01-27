@extends('templates.user.default')

@section('content')
<hr>
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
<div class="shop-page-area section pt-95 pt-lg-75 pt-md-65 pt-sm-55 pt-xs-40  pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
        <div class="container-fluid pl-80 pl-lg-15 pl-md-15 pl-sm-15 pl-xs-15  pr-80 pr-lg-15 pr-md-15 pr-sm-15 pr-xs-15">
            <div class="row row-30">
                <div class="col-lg-9 order-lg-2 order-1">
                    <div class="shop-top-bar shop-top-bar-flex mb-40 mb-xs-20">
                    </div>
                    <div class="product-area-wrap">
                        <div class="tab-content jump">
                            <div id="shop-1" class="tab-pane active">
                                <div class="row">
                                  @foreach($alats as $alat)
                                    <div class=" coustom-col-4 col-xl-3 col-12">
                                        <!--  Single Grid product Start -->
                                        <div class="single-grid-product mb-70 mb-lg-50 mb-md-50 mb-sm-30 mb-xs-30">
                                            <div class="product-image">
                                                <div class="product-label">
                                                  @if($alat->created_at->format('d M Y') == now()->format('d M Y'))
                                                    <span class="sale">Baru</span>
                                                    @endif
                                                </div>
                                                <a href="{{route('alat.detail',[$alat->id,$alat->slug])}}">
                                                    <img src="{{asset('images/'.$alat->gambar)}}" class="img-fluid" alt="">
                                                </a>
                                                <div class="product-action">
                                                    <ul>
                                                      <form id="keranjang-forms{{$alat->id}}" class="" action="{{route('keranjang.tambah', $alat)}}" method="post">
                                                        @csrf
                                                        @if($alat->stok < 1)
                                                          <li><a title="Detail Alat" href="#" data-toggle="modal" data-target="#detail{{$alat->id}}"><i class="fa fa-search-plus"></i></a></li>
                                                        @else
                                                        <li><a title="Detail Alat" href="#" data-toggle="modal" data-target="#detail{{$alat->id}}"><i class="fa fa-search-plus"></i></a></li>
                                                      <li><a title="Tambahkan ke keranjang" onclick="event.preventDefault();
                                                                    document.getElementById('keranjang-forms{{$alat->id}}').submit();"><i class="fa fa-shopping-cart"></i></a></li>
                                                        @endif
                                                    </form>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content text-left">
                                                <h3 class="title"><a href="single-product.html">{{$alat->nama}}</a></h3>
                                                <h5>{{$alat->kategori->nama}}</h5>
                                                <p class="product-price"><span class="main-price discounted">Rp. {{number_format($alat->harga,0,',','.')}} /Hari</span></p>
                                                <div class="product-rating">
                                                    <!-- <span class="rating">
                                                <i class="fa fa-star"></i> -->
                                            </span>
                                            <div class="text-right mt-3">
                                              <h5>{{$alat->tipe}}</h5>
                                            </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--  Single Grid product End -->
                                    </div>
                                    <div class="modal fade" id="detail{{$alat->id}}" tabindex="-1" role="dialog">
                                       <div class="modal-header">
                                           <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="dlicon ui-1_simple-remove"></i></button>
                                       </div>
                                       <div class="modal-dialog" role="document">
                                           <div class="modal-content">
                                               <div class="modal-body">
                                                   <div class="row">
                                                       <div class="col-lg-6 col-sm-12 col-xs-12">
                                                           <div class="product-details-tab">
                                                               <div class="product-tabs pro-dec-big-img-slider">
                                                                   <div class="easyzoom-style">
                                                                       <div class="easyzoom easyzoom--overlay">
                                                                           <div class="product-label">
                                                                             @if($alat->created_at->format('d M Y') == now()->format('d M Y'))
                                                                               <span class="sale">Baru</span>
                                                                               @endif
                                                                           </div>
                                                                               <img src="{{asset('images/'.$alat->gambar)}}" width="500px" height="400px" alt="">
                                                                           </a>
                                                                       </div>
                                                                   </div>
                                                               </div>
                                                           </div>
                                                       </div>
                                                       <div class="col-lg-6 col-sm-12 col-xs-12">
                                                           <div class="product-details-content quickview-content">
                                                               <h2>{{$alat->nama}}</h2>
                                                               <div class="product-rating-stock">
                                                                   <div class="product-dec-rating-reviews">
                                                                       <div class="product-dec-rating">
                                                                           <!-- <i class="fa fa-star"></i> -->
                                                                       </div>

                                                                       <!-- <div class="product-dec-reviews">
                                                                           <a> (3 customer reviews)</a>
                                                                       </div> -->
                                                                   </div>
                                                                    @if($alat->stok > 0)
                                                                   <div class="pro-stock">
                                                                       <span><i class="dlicon ui-1_check-circle-08"></i>Stok ada {{$alat->stok}}</span>
                                                                   </div>
                                                                   @else
                                                                   <div class="pro-stock">
                                                                       <span><i class=""></i>Stok kosong</span>
                                                                   </div>
                                                                    @endif
                                                               </div>
                                                               <p class="product-price product-details-price"><span class="discounted-price">Rp. {{number_format($alat->harga,0,',','.')}} /Hari</span></p>
                                                               <p class="fz-16">{{$alat->keterangan}}</p>
                                                               @if($alat->stok < 1)
                                                               <h3 class="mt-3">Stok Kosong</h3>
                                                               @else
                                                               <form id="keranjang-form{{$alat->id}}" class="" action="{{route('keranjang.tambah', $alat)}}" method="post">
                                                                 @csrf
                                                                 <div class="pro-details-quality">
                                                                   <td class="product-quantity">
                                                                     <div class="quantity quantity--2" id="quantity2">
                                                                       <input type="text" class="quantity-input" id="qty2" value="1" disabled style="background-color:transparent">
                                                                       <div class="dec qtybutton">-</div>
                                                                       <div class="inc qtybutton">+</div>
                                                                       <span id='stok_alat' style="display:none">{{$alat->stok}}</span>
                                                                        <input type="hidden" id="qty3" name="qty" value="1">
                                                                   </div>
                                                                   <input type="hidden" id="stok_alat" name="" value="{{$alat->stok}}">
                                                                    </td>
                                                                     <div class="pro-details-cart btn-hover">
                                                                         <a onclick="document.getElementById('keranjang-form{{$alat->id}}').submit(); return false;">Tambah ke keranjang</a>
                                                                     </div>
                                                                 </div>
                                                               </form>
                                                               @endif
                                                               <div class="pro-details-sku">
                                                                 <span>Nama Pemilik: {{$alat->owner->nama}}</span>
                                                               </div>
                                                               <div class="pro-details-sku">
                                                                 <span>Nama Toko: {{$alat->owner->toko->nama}}</span>
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
                                       </div>
                                   </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="page-pagination-area">
                          {{$alats->links()}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-lg-1 order-2">
                    <div class="shop-sidebar">
                        <div class="sidebar-widget sidebar-border pb-45">
                            <h4 class="pro-sidebar-title">Kategori </h4>
                            <div class="sidebar-widget-list mt-30">
                                <ul>
                                  @foreach($kategoris as $kategori)
                                    <li><a href="{{route('kategori', $kategori->slug)}}">{{$kategori->nama}}</a><span>({{count($kategori->alats)}})</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
