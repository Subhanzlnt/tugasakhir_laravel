<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        @auth('admin')
            <li class="nav-item @if (Request::is('admin/beranda')) active @endif">
                <a style="text-decoration:none" class="nav-link" href="{{ route('admin.beranda') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Beranda</span>
                </a>
            </li>
            <li class="nav-item  @if (Request::is('admin/toko') || Request::is('admin/toko/edit')) active @endif">
                <a style="text-decoration:none" class="nav-link" href="{{ route('admin.toko') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Toko</span>
                </a>
            </li>
            <li class="nav-item @if (Request::is('admin/penyewa') || Request::is('admin/pemilik')) active @endif">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-account-multiple menu-icon"></i>
                    <span class="menu-title">Data Pengguna</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic">
                    <ul class="nav flex-column sub-menu">
                        {{-- <li class="nav-item @if (Request::is('admin/pemilik')) active @endif"> <a class="nav-link" href="{{ route('admin.pemilik') }}">Pemilik</a></li> --}}
                        <li class="nav-item  @if (Request::is('admin/penyewa')) active @endif"> <a class="nav-link" href="{{ route('admin.penyewa') }}">Penyewa</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @if (Request::is('admin/alat') || Request::is('admin/paketan')) active @endif">
                <a class="nav-link" data-toggle="collapse" href="#alat" aria-expanded="false" aria-controls="ui-basic">
                    <i class="mdi mdi-briefcase menu-icon"></i>
                    <span class="menu-title">Data Alat</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="alat">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item @if (Request::is('admin/alat')) active @endif"> <a class="nav-link" href="{{ route('admin.alat') }}">Alat</a></li>
                        <li class="nav-item  @if (Request::is('admin/paketan')) active @endif"> <a class="nav-link" href="{{ route('admin.paket') }}">Paketan</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item @if (Request::is('admin/kategori')) active @endif">
                <a style="text-decoration:none" class="nav-link" href="{{ route('admin.kategori') }}">
                    <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                    <span class="menu-title">Kategori Alat</span>
                </a>
            </li>
            <li class="nav-item @if (Request::is('admin/pemesanan')) active @endif">
                <a style="text-decoration:none" class="nav-link" href="{{ route('admin.pemesanan') }}">
                    <i class="mdi mdi-shopping menu-icon"></i>
                    <span class="menu-title">Data Pemesanan</span>
                </a>
            </li>
        @elseif('owner')
            <li class="nav-item @if (Request::is('beranda')) active @endif">
                <a style="text-decoration:none" class="nav-link" href="{{ route('pemilik.beranda') }}">
                    <i class="mdi mdi-airplay menu-icon"></i>
                    <span class="menu-title">beranda</span>
                </a>
            </li>
            <li class="nav-item  @if (Request::is('toko') || Request::is('toko/tambah') ||
                Request::is('toko/edit')) active @endif">
                <a style="text-decoration:none" class="nav-link" href="{{ route('pemilik.toko') }}">
                    <i class="mdi mdi-home menu-icon"></i>
                    <span class="menu-title">Toko</span>
                </a>
            </li>
            <li class="nav-item @if (Request::is('alat') || Request::is('alat/tambah') ||
                Request::is('alat/edit/*')) active @endif">
                <a style="text-decoration:none" class="nav-link" href="{{ route('pemilik.alat') }}">
                    <i class="mdi mdi-briefcase menu-icon"></i>
                    <span class="menu-title">Data Alat</span>
                </a>
            </li>
            <li class="nav-item @if (Request::is('paket') || Request::is('paket/tambah') ||
                Request::is('paket/edit/*')) active @endif">
                <a style="text-decoration:none" class="nav-link" href="{{ route('pemilik.paket') }}">
                    <i class="mdi mdi-clipboard menu-icon"></i>
                    <span class="menu-title">Data Paketan</span>
                </a>
            </li>
            <li class="nav-item @if (Request::is('data-pemesanan')) active @endif">
                <a style="text-decoration:none" class="nav-link" href="{{ route('pemilik.pemesanan') }}">
                    <i class="mdi mdi-shopping menu-icon"></i>
                    <span class="menu-title">Pemesanan</span>
                </a>
            </li>
        @endauth
    </ul>
</nav>
