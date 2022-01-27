@include('templates.user.partials._head')

<div class="error-404-page-area section">
            <div class="container">
                <div class="row align-items-center height-100vh">
                    <div class="col-lg-7 col-md-7">
                        <div class="error-content">
                            <h1>Verifikasi Email</h1>
                            <h2>{{$message}}</h2>
                            <a class="read-btn border" href="{{url('/')}}">Kembali ke beranda</a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5">
                        <div class="error-image">
                            <img src="{{asset('assets/user/img/confetti.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@include('templates.user.partials._script')
