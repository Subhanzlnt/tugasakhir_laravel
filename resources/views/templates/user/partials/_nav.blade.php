<div class="search-flyoveray"></div>
<div class="cart-flyout">
    <div class="cart-flyout-inner">
        <a class="btn-close-cart" href="#">
            <i class="dlicon ui-1_simple-remove"></i>
        </a>
        <div class="cart-flyout__content">
            <div class="cart-flyout__heading">Keranjang</div>
            @auth('web')
            <div class="widget_shopping_cart_content">
                <ul class="product_list_widget">
                  @foreach($keranjangs as $keranjang)
                    <li>
                        <div class="thumb">
                            <img src="{{asset('images/'.$keranjang->alat->gambar)}}" alt="product">
                        </div>
                        <div class="content">
                            <h6><a href="single-product.html">{{$keranjang->alat->nama}}</a></h6>
                            <div class="quntity">{{$keranjang->qty}} x {{number_format($keranjang->alat->harga,0,',','.')}}</div>
                            <!-- <form class="" action="{{route('keranjang.hapus', $keranjang)}}" method="post">
                              @csrf
                              <button class="remove-btn" type="submit">×</button>
                            </form> -->
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
            <p class="minicart__total">Total: <span class="price">Rp. {{number_format($keranjangs->sum('total'),0,',','.')}}</span></p>
            <div class="cart__btn">
              @if(Request::is('keranjang'))
              <a href="{{route('pemesanan')}}">Pembayaran</a>
              @else
                <a href="{{route('keranjang.tampil')}}">Lihat Keranjang</a>
                <a href="{{route('pemesanan')}}">Pembayaran</a>
              @endif
            </div>
            @endauth
        </div>
    </div>
</div>
<!-- End Search Flyover -->
<!-- Start Search FlyOver Area -->
<div class="search-flyoverlay-area">
    <div class="btn-close-search">
        <i class="dlicon ui-1_simple-remove"></i>
    </div>
    <div class="searchform-fly">
        <p class="searchform-fly-text">Start typing and press Enter to search !</p>
        <form class="search-form" action="#">
            <input type="text" placeholder="Search">
            <button class="search-button" type="submit">
                <i class="dlicon ui-1_zoom"></i>
            </button>
        </form>
    </div>
</div>
<!-- End Search FlyOver Area -->

<!-- Start Hamburger -->
<div class="hamburger-area">
    <div class="btn-close-search">
        <button>
            <i class="dlicon ui-1_simple-remove"></i>
        </button>
    </div>
    <div class="hamburger-menu-main d-none d-xl-block">
        <div class="humberger-top">
            <div class="hum-mainmenu">
                <ul>
                  @guest('web')
                    <li><a href="{{route('login')}}">Login</a></li>
                    <li><a href="{{route('register')}}">Register</a></li>
                  @else
                    <li><a href="#">{{Auth::user()->nama}}</a></li>
                    <li><a href="{{route('edit.profile')}}">Edit Profil</a></li>
                    {{-- <li><a href="{{route('member.daftar')}}">Daftar Member</a></li> --}}
                    <li><a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                      Keluar
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                  </li>
                  @endguest
                </ul>
            </div>
        </div>
    </div>
    <!-- Start Main Menu -->



    <ul class="menu-primary-menu-1 responsive-manu d-block d-xl-none" id="responsive-manu">
        <li><a href="#">Baranda</a></li>
        <li><a href="#">Kategori</a></li>
        <li><a href="#">Kontak</a></li>
        <li><a href="#">Penyewa</a></li>
        @guest
          <li><a href="{{route('login')}}">Login</a></li>
          <li><a href="{{route('register')}}">Register</a></li>
        @else
          <li><a href="#">{{Auth::user()->name}}</a></li>
          <li><a href="#">Edit Profil</a></li>
          <li><a href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
            Keluar
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
        </li>
        @endguest
    </ul>

    <!-- End Main Menu -->
</div>
<!-- End Hamburger -->
