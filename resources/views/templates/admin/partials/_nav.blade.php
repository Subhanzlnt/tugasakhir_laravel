<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo" href="{{route('admin.beranda')}}">Medaeng Jaya</a>
    <a class="navbar-brand brand-logo-mini" href="{{route('admin.beranda')}}"><img src="{{ asset('assets/user/img/confetti.png')}}" alt="logo"/></a>

  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
    <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
      <span class="mdi mdi-menu"></span>
    </button>
    <ul class="navbar-nav navbar-nav-right">
      <b>{{Auth()->user()->nama}}</b>
      <li class="nav-item nav-profile dropdown">
        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
          @auth('admin')
          <img src="{{asset('assets/admin/avatar-1.png')}}" alt="profile"/>
          @else
          <img src="{{asset('images/'.Auth::user()->foto)}}" alt="profile"/>
          @endauth
        </a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
          <div class="dropdown-divider"></div>
          @auth('admin')
          <a class="dropdown-item" href="{{ route('admin.logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-admin-form').submit();">
            <i class="mdi mdi-logout text-primary"></i>
            Logout
          </a>
          <form id="logout-admin-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          @elseif('owner')
          <a class="dropdown-item" href="{{route('pemilik.profil')}}">
            <i class="mdi mdi-account text-primary"></i>
            Edit Profil
          </a>
          <a class="dropdown-item" href="{{ route('logout') }}"
             onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
            <i class="mdi mdi-logout text-primary"></i>
            Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
            @endauth
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
  </div>
</nav>
