@extends('templates.user.default')

@section('content')
<!--slider section start-->
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
<hr>
<div class="new-slider position-relative">
    <div id="rev_slider_36_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="home-02" data-source="gallery" style="margin:0px auto;background:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.4.7 auto mode -->
        <div id="rev_slider_36_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.4.7">
            <ul>
                @if(!$headers->isEmpty())
              <li data-index="rs-68" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <!-- <img src="./assets/images/./assets/images/transparent.png" data-bgcolor='#f9f9f9' style='background:#f9f9f9' alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina> -->
                            <!-- LAYERS -->

                            <!-- LAYER NR. 1 -->
                            <div class="tp-caption     rev_group" id="slide-68-layer-1" data-x="['left','left','left','center']" data-hoffset="['55','55','55','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['55','55','55','150']" data-width="380" data-height="150" data-whitespace="nowrap" data-type="group" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; min-width: 380px; max-width: 380px; max-width: 150px; max-width: 150px; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff;">
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption   tp-resizeme text-white" id="slide-68-layer-2" data-x="['left','left','left','center']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="text" data-responsive_offset="on" data-frames='[{"delay":"+520","speed":1680,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; white-space: nowrap; font-size: 46px; line-height: 55px; font-weight: 400; color: #1a1a1a;font-family:Arimo;">{!! $headers[0]->nama!!} </div>

                                <!-- LAYER NR. 3 -->
                                <a href="{{route('alat.detail',[$headers[0]->id,$headers[0]->slug])}}">
                                <div class="tp-caption rev-btn text-white" id="slide-68-layer-3" data-x="['left','left','left','center']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" data-fontsize="['16','16','16','14']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-frames='[{"delay":"+830","speed":1680,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(26,26,26);bc:rgb(26,26,26);"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,10]" data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,10]" data-paddingleft="[35,35,35,35]" style="z-index: 8; white-space: nowrap; font-size: 16px; line-height: 35px; font-weight: 700; color: #1a1a1a;font-family:Arimo;text-transform:uppercase;background-color:rgba(0,0,0,0);border-color:rgba(0,0,0,0.3);border-style:solid;border-width:2px 2px 2px 2px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">Lihat</div></a>
                            </div>

                            <!-- LAYER NR. 4 -->
                            <div class="tp-caption   tp-resizeme" id="slide-68-layer-5" data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['0','0','0','50']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"delay":330,"speed":1680,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;"><img src="{!! asset('images/'.$headers[0]->gambar)!!}" alt="" data-ww="['970px','970px','778px','478px']" data-hh="['755px','755px','606','372']" data-no-retina> </div>
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-69" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <!-- <img src="assets/./assets/images/transparent.png" data-bgcolor='#f9f9f9' style='background:#f9f9f9' alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina> -->
                            <!-- LAYERS -->

                            <!-- LAYER NR. 6 -->
                            <div class="tp-caption     rev_group" id="slide-69-layer-1" data-x="['left','left','left','left']" data-hoffset="['55','55','55','55']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['55','55','55','120']" data-width="380" data-height="['210','210','210','150']" data-whitespace="nowrap" data-type="group" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; min-width: 380px; max-width: 380px; max-width: 210px; max-width: 210px; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff;">
                                <!-- LAYER NR. 7 -->
                                <div class="tp-caption   tp-resizeme text-white" id="slide-69-layer-2" data-x="['left','left','left','center']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" data-fontsize="['46','46','46','32']" data-lineheight="['55','55','55','40']" data-width="361" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"delay":"+520","speed":1680,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; min-width: 361px; max-width: 361px; white-space: normal; font-size: 46px; line-height: 55px; font-weight: 400; color: #1a1a1a;font-family:Arimo;">{!! $headers[1]->nama!!} </div>

                                <!-- LAYER NR. 8 -->
                                <a href="{{route('alat.detail',[$headers[1]->id,$headers[1]->slug])}}">
                                <div class="tp-caption rev-btn text-white" id="slide-69-layer-3" data-x="['left','left','left','center']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" data-fontsize="['16','16','16','14']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-frames='[{"delay":"+830","speed":1680,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(26,26,26);bc:rgb(26,26,26);"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,10]" data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,10]" data-paddingleft="[35,35,35,35]" style="z-index: 8; white-space: nowrap; font-size: 16px; line-height: 35px; font-weight: 700; color: #1a1a1a;font-family:Arimo;text-transform:uppercase;background-color:rgba(0,0,0,0);border-color:rgba(0,0,0,0.3);border-style:solid;border-width:2px 2px 2px 2px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">Lihat </div></a>
                            </div>

                            <!-- LAYER NR. 9 -->
                            <div class="tp-caption   tp-resizeme" id="slide-69-layer-5" data-x="['left','left','left','center']" data-hoffset="['0','0','0','-80']" data-y="['top','top','top','top']" data-voffset="['0','0','0','50']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"delay":300,"speed":1680,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;"><img src="{!! asset('images/'.$headers[1]->gambar)!!}" alt="" data-ww="['970px','970px','778px','480px']" data-hh="['755','755','606','374px']" data-no-retina> </div>
                        </li>
                        <!-- SLIDE  -->
                        <li data-index="rs-70" data-transition="fade" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="assets/./assets/images/transparent.png" data-bgcolor='#f9f9f9' style='background:#f9f9f9' alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 10 -->
                            <div class="tp-caption     rev_group" id="slide-70-layer-1" data-x="['left','left','left','center']" data-hoffset="['55','55','55','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['55','55','55','125']" data-width="480" data-height="['210','210','210','180']" data-whitespace="nowrap" data-type="group" data-responsive_offset="on" data-frames='[{"delay":10,"speed":300,"frame":"0","from":"opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 6; min-width: 480px; max-width: 480px; max-width: 210px; max-width: 210px; white-space: nowrap; font-size: 20px; line-height: 22px; font-weight: 400; color: #ffffff;">
                                <!-- LAYER NR. 11 -->
                                <div class="tp-caption   tp-resizeme text-white" id="slide-70-layer-2" data-x="['left','left','left','center']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" data-fontsize="['46','46','46','32']" data-lineheight="['55','55','55','35']" data-width="['432','432','432','364']" data-height="none" data-whitespace="normal" data-type="text" data-responsive_offset="on" data-frames='[{"delay":"+520","speed":1680,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','center']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 7; min-width: 432px; max-width: 432px; white-space: normal; font-size: 46px; line-height: 55px; font-weight: 400; color: #1a1a1a;font-family:Arimo;">{!! $headers[2]->nama !!} </div>

                                <!-- LAYER NR. 12 -->
                                <a href="{{route('alat.detail',[$headers[2]->id,$headers[2]->slug])}}">
                                <div class="tp-caption rev-btn text-white" id="slide-70-layer-3" data-x="['left','left','left','center']" data-hoffset="['0','0','0','0']" data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" data-fontsize="['16','16','16','14']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="button" data-responsive_offset="on" data-frames='[{"delay":"+830","speed":1680,"frame":"0","from":"y:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"0","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgb(255,255,255);bg:rgb(26,26,26);bc:rgb(26,26,26);"}]' data-margintop="[0,0,0,0]" data-marginright="[0,0,0,0]" data-marginbottom="[0,0,0,0]" data-marginleft="[0,0,0,0]" data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[12,12,12,10]" data-paddingright="[35,35,35,35]" data-paddingbottom="[12,12,12,10]" data-paddingleft="[35,35,35,35]" style="z-index: 8; white-space: nowrap; font-size: 16px; line-height: 35px; font-weight: 700; color: #1a1a1a;font-family:Arimo;text-transform:uppercase;background-color:rgba(0,0,0,0);border-color:rgba(0,0,0,0.3);border-style:solid;border-width:2px 2px 2px 2px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;cursor:pointer;">Lihat </div></a>
                            </div>

                            <!-- LAYER NR. 13 -->
                            <div class="tp-caption   tp-resizeme" id="slide-70-layer-5" data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']" data-y="['top','top','top','top']" data-voffset="['0','0','0','0']" data-width="none" data-height="none" data-whitespace="nowrap" data-type="image" data-responsive_offset="on" data-frames='[{"delay":310,"speed":1680,"frame":"0","from":"x:50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]' data-textAlign="['inherit','inherit','inherit','inherit']" data-paddingtop="[0,0,0,0]" data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="z-index: 5;"><img src="{!! asset('images/'.$headers[2]->gambar)!!}" alt="" data-ww="['970px','970px','778px','578px']" data-hh="['738px','738','592','440']" data-no-retina> </div>
                        </li>
                        @endif
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div><!-- END REVOLUTION SLIDER -->
</div>
<!--slider section end-->
<div class="product-section section pt-45 pt-lg-25 pt-md-15 pt-sm-10 pt-xs-0 pb-90 pb-lg-70 pb-md-60 pb-sm-50 pb-xs-40">
            <div class="container-fluid pl-140 pr-140 pl-lg-15 pl-md-15 pl-sm-15 pl-xs-15 pr-lg-15 pr-md-15 pr-sm-15 pr-xs-15">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center before-none text-bold">
                            <h2>Alat Pesta</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <div id="all" class="tab-pane active">
                                <div class="row row-40">
                                  @php($no = 0)
                                  @foreach($alats as $alat)
                                  @php($id = $alat->id)
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                        <!--  Single Grid product Start -->
                                        <div class="single-grid-product mb-70 mb-md-50 mb-sm-30 mb-xs-30">
                                            <div class="product-image">
                                                <div class="product-label">
                                                  @if($alat->created_at->format('d M Y') == now()->format('d M Y'))
                                                    <span class="sale">Baru</span>
                                                    @endif
                                                </div>
                                                <a href="{{route('alat.detail',[$alat->id,$alat->slug])}}">
                                                    <img src="{{asset('images/'.$alat->gambar)}}" class="" width="500px" height="400px" alt="">
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
                                                <h2 class="title"><a href="single-product.html">{{$alat->nama}}</a></h2>
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
        <!-- Modal detail Alat -->
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
                                               <i class="fa fa-star"></i>
                                           </div>
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
       @php($no ++)
          @endforeach
    <input type="hidden" id="jumlah" value="{{count($keranjangs)}}">
    </div>
   </div>
  </div>
 </div>
</div>
          <div class="row">
              <div class="col-12">
                  <div class="view-more-btn">
                      <a href="{{route('semua')}}">Lihat Semua</a>
                  </div>
              </div>
          </div>
      </div>
  </div>
        <!-- Product Section End -->


<!-- Feature Section Start -->
<div class="feature-section section pt-100 pt-lg-80 pt-md-70 pt-sm-60 pt-xs-50">
    <div class="container-fluid pl-140 pl-lg-15 pl-md-15 pl-sm-15 pl-xs-15 pr-140 pr-lg-15 pr-md-15 pr-sm-15 pr-xs-15">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <!-- Single Feature Start -->
                <div class="single-feature mb-30">
                    <div class="feature-icon">
                        <i class="dlicon shopping_delivery-fast"></i>
                    </div>
                    <div class="feature-content">
                        <h3 class="title">Gratis Biaya Pengiriman</h3>
                        <!-- <p>Donec arcu lectus, pellentesque at dictum ac</p> -->
                    </div>
                </div>
                <!-- Single Feature End -->
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <!-- Single Feature Start -->
                <div class="single-feature mb-30">
                    <div class="feature-icon">
                        <i class="dlicon holidays_gift"></i>
                    </div>
                    <div class="feature-content">
                        <h3 class="title">Kualitas terbaik</h3>
                    </div>
                </div>
                <!-- Single Feature End -->
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <!-- Single Feature Start -->
                <div class="single-feature mb-30">
                    <div class="feature-icon">
                        <i class="dlicon shopping_credit-locked"></i>
                    </div>
                    <div class="feature-content">
                        <h3 class="title">Pembayaran Aman</h3>
                    </div>
                </div>
                <!-- Single Feature End -->
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6">
                <!-- Single Feature Start -->
                <div class="single-feature mb-30">
                    <div class="feature-icon">
                        <i class="fa fa-handshake-o"></i>
                    </div>
                    <div class="feature-content">
                        <h3 class="title">Pelayanan Terbaik</h3>
                    </div>
                </div>
                <!-- Single Feature End -->
            </div>
        </div>
    </div>
</div>
<!-- Feature Section End -->

<!-- Countdown Section Start -->
<!-- <div class="countdown-section section bg-gray pt-100 pt-lg-80 pt-md-70 pt-sm-50 pt-xs-45 pb-100 pb-lg-80 pb-md-70 pb-sm-60 pb-xs-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="countdown-content">
                    <h2 class="title">Modern <br> floor lamp</h2>
                        <p>Donec nunc nunc, gravida vitae diam vel, varius interdum erat. Quisque a nunc vel diam auctor </p>
                        <div class="countdown-area">
                            <div class="single-countdown">
                                <span class="single-countdown-time">30</span>
                                <span class="single-countdown-text">Days</span>
                            </div>
                            <div class="single-countdown">
                                <span class="single-countdown-time">20</span>
                                <span class="single-countdown-text">Hours</span>
                            </div>
                            <div class="single-countdown">
                                <span class="single-countdown-time">26</span>
                                <span class="single-countdown-text">Minutes</span>
                            </div>
                            <div class="single-countdown">
                                <span class="single-countdown-time">26</span>
                                <span class="single-countdown-text">Seconds</span>
                            </div>
                        </div>
                        <a class="btn" href="#">Shop Now</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="countdown-banner d-flex align-items-center mt-sm-60 mt-xs-50">
                    <div class="banner-offer">
                        <span class="banner-sale-headline">Sale 30%</span>
                        <span class="normal-headline">only $199.99</span>
                    </div>
                    <div class="banner-image">
                        <img src="./assets/images/banner/home02-banner-01.png" alt="">
                    </div>
                    <div class="offer-product-name">
                        <p>Ihor Lopatiuk</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Countdown Section End -->

@endsection
