
<!DOCTYPE html>
<html lang="en">
@include('templates.admin.partials._head')
<body class="sidebar-mini">
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    @include('templates.admin.partials._nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('templates.admin.partials._sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        @include('templates.admin.partials._footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  @include('templates.admin.partials._script')
  <!-- End custom js for this page-->
</body>
</html>
