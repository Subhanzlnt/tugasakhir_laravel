
    <!-- All jquery file included here -->
    <script src="{{ asset('assets/user/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script> -->
    <script src="{{ asset('assets/user/js/vendor/popper.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/vendor/bootstrap.min.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> -->

    <script src="{{ asset('assets/user/js/plugins/plugins.js')}}"></script>
    <script src="{{ asset('assets/user/js/rev/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/rev/jquery.themepunch.tools.min.js')}}"></script>


    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{ asset('assets/user/js/rev/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/rev/revolution.extension.carousel.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/rev/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/rev/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/rev/revolution.extension.migration.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/rev/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/rev/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/rev/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{ asset('assets/user/js/rev/revolution.extension.video.min.js')}}"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script> -->
    <script src="{{ asset('assets/user/js/rev/revoulation.js')}}"></script>
    <script src="{{ asset('assets/user/js/main.js')}}"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    @if(Request::is('keranjang'))
    <script src="{{ asset('assets/user/js/subtotal.js')}}"></script>
    <script src="{{ asset('assets/user/js/date.js')}}"></script>
    <script src="{{ asset('assets/user/js/quantity.js')}}"></script>
    @endif
    @if(Request::is('/') || Request::is('semua') || Request::is('alat/detail/*') || Request::is('kategori/*'))
    <script src="{{ asset('assets/user/js/quantity2.js')}}"></script>
    @endif
