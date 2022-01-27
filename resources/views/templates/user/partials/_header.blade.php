<header class="header  ">
    <div class="header-deafult menu-right height-150 d-flex align-items-center">
        <div class="container-fluid pl-80 pr-80 pl-lg-15 pl-md-15 pl-sm-15 pl-xs-15 pr-lg-15 pr-md-15 pr-sm-15 pr-xs-15">
            <div class="row align-items-center">
                <div class="col-xl-3 col-lg-6 col-md-6 col-4">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{asset('assets/user/img/confetti.png')}}" alt=""></a>
                    </div>
                </div>
                <!--Menu start-->
                <div class="col-xl-6  d-none d-xl-block">
                    <div class="menu-center d-flex justify-content-center">
                        <nav class="main-menu ">
                            <ul>
                                <li class="@if(Request::is('/')) active @endif"><a href="{{url('/')}}">Beranda</a>
                                </li>
                                <li class="@if(Request::is('semua') || Request::is('kategori/*') ) active @endif"><a href="{{url('semua')}}">Kategori</a>
                                </li>
                                <li class="@if(Request::is('kontak')) active @endif"><a href="{{url('/kontak')}}">Kontak</a>
                                </li>
                                @auth('web')
                                <li class="@if(Request::is('keranjang')) active @endif"><a href="{{url('keranjang')}}">Keranjang</a>
                                </li>
                                <li class="@if(Request::is('data-pembayaran') || Request::is('pemesanan')) active @endif"><a href="{{url('data-pembayaran')}}">Pembayaran</a>
                                </li>
                                @endauth
                            </ul>
                        </nav>
                    </div>
                </div>

                <!--Menu end-->
                <div class="col-xl-3 col-lg-6 col-md-6 col-8 d-flex justify-content-end">
                    <div class="header-icon search ">
                        <a class="search-trigger" href="#">
                            <i class="dlicon ui-1_zoom"></i>
                        </a>
                    </div>
                    @if(Request::is('/') || Request::is('keranjang') ||  Request::is('kontak') || Request::is('semua') || Request::is('alat/detail/*') || Request::is('edit/profil') || Request::is('data-pembayaran'))
                    <div class="header-icon cart ">
                        <a class="cart-trigger" href="#">
                            <span class="cart-count">{{count($keranjangs)}}</span>
                            <i class="dlicon shopping_cart-modern"></i>
                        </a>
                    </div>
                    @endif
                    <div class="header-icon hamburger-menu ">
                        <a class="hamburger-trigger d-none d-xl-block" href="#">
                            <i class="dlicon ui-3_menu"></i>
                        </a>

                        <a class="hamburger-trigger d-block d-xl-none" href="#">
                            <i class="dlicon ui-3_menu"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
