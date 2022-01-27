
<!doctype html>
<html class="no-js" lang="zxx">

@include('templates.user.partials._head')
<body class="">

    <div id="main-wrapper" class=" ">

        <!--Header section start-->
        @include('templates.user.partials._header')
        <!--Header section end-->


        <!-- Start Loader Area -->
        <div class="la-image-loading">
            <div class="content">
                <div class="la-loader spinner3">
                    <div class="dot1"></div>
                    <div class="dot2"></div>
                    <div class="bounce1"></div>
                    <div class="bounce2"></div>
                    <div class="bounce3"></div>
                    <div class="cube1"></div>
                    <div class="cube2"></div>
                    <div class="cube3"></div>
                    <div class="cube4"></div>
                </div>
            </div>
        </div>
        <!-- End Loader Area -->
        <!-- Start Search Flyover -->
        @include('templates.user.partials._nav')
        @yield('content')
        <!-- Start Footer Area -->
        <footer class="footer-default section bg-black pl-100 pr-100 pl-lg-15 pl-md-15 pl-sm-15 pl-xs-15 pr-lg-15 pr-md-15 pr-sm-15 pr-xs-15">

            <!-- Start Copyright Area -->
            <div class="copyright-area">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="content text-center">
                            <p>© {{now()->format('Y')}} Medaeng Jaya</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
        <!-- End Footer Area -->






    </div>

    <!-- Placed js at the end of the document so the pages load faster -->

  @include('templates.user.partials._script')



</body>

</html>
