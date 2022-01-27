<!DOCTYPE html>
<html lang="en">
@include('templates.admin.partials._head')
<body class="sidebar-mini">
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="d-flex justify-content-center mb-4">
                  <img width="100px" height="100px" src="{{ asset('assets/user/img/confetti.png')}}" alt="logo">
              </div>
              <h2 class="text-center">Admin Login</h2>
              @if(session()->has('error') || $errors->has('password') ||  $errors->has('username'))
              <div class="alert alert-fill-danger" role="alert">
                <i class="mdi mdi-alert-circle"></i>
                Gagl Login, Silahkan coba lagi
              </div>
              @endif
              <form class="pt-3" method="POST" action="{{route('admin.get.login')}}">
                @csrf
                <div class="form-group">
                  <input type="text" name="username" class="form-control form-control-lg @if( $errors->has('password') ||  $errors->has('username')) is-invalid @endif" placeholder="Username" autofocus>
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg @if( $errors->has('password') ||  $errors->has('username')) is-invalid @endif" placeholder="Password">
                </div>
                <div class="mt-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >Masuk</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('asset/vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{ asset('asset/vendors/js/vendor.bundle.addons.js')}}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('asset/js/off-canvas.js')}}"></script>
  <script src="{{ asset('asset/js/hoverable-collapse.js')}}"></script>
  <script src="{{ asset('asset/js/template.js')}}"></script>
  <script src="{{ asset('asset/js/settings.js')}}"></script>
  <script src="{{ asset('asset/js/todolist.js')}}"></script>
  <script>
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
  });
  }, 5000);
  </script>


  </body>
</html>
