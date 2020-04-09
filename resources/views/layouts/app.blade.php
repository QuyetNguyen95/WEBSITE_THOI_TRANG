<!doctype html>
<html class="no-js" lang="">
    <!-- Tieu Long Lanh -->
    <head>
        <!-- Basic page needs
            ============================================ -->
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Nguyễn Cương Quyết</title>
        <meta name="description" content="">
        <!-- Mobile specific metas
            ============================================ -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font
            ============================================ -->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <!-- Favicon
            ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}">
        <!-- CSS  -->
        <!-- Bootstrap CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <!-- owl.carousel CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
        <!-- owl.theme CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('css/owl.theme.css')}}">
        <!-- owl.transitions CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('css/owl.transitions.css')}}">
        <!-- font-awesome CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
        <!-- animate CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('css/animate.css')}}">
        <!-- slicknav CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('css/slicknav.css')}}">
        <!-- rs-plugin CSS
            ============================================ -->
        <link href="{{asset('lib/rs-plugin/css/settings.css')}}" rel="stylesheet" />
        <!-- normalize CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
        <!-- jquery-ui CSS
		============================================ -->
        <link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
        <!-- main CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('css/main.css')}}">
        <!-- style CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('style.css')}}">
        <!-- responsive CSS
            ============================================ -->
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
        <!-- modernizr js
            ============================================ -->
        <script src="{{asset('js/vendor/modernizr-2.8.3.min.js')}}"></script>

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <style>
            .error{
                color: red;
                margin-top: -37px;
                margin-bottom: 30px;
            }
            .responsive {
                width: 100%;
                height: auto:
                }
            .error-text{
                color: red;
                font-style: italic;
            }
            #scrollUp{
                bottom: 138px;
            }

            .invalid-feedback{
                color: red;
                font-style: italic;
            }
            /* Step Progress bar */
            .container1 {
            width: 600px;
            margin-left: 25%;
            margin-bottom: 200px;
                    }
            .progressbar {
                counter-reset: step;
            }
            .progressbar li {
                list-style-type: none;
                width: 33%;
                float: left;
                font-size: 12px;
                position: relative;
                text-align: center;
                text-transform: uppercase;
                color: #7d7d7d;
            }
            .progressbar li:before {
                width: 30px;
                height: 30px;
                content: counter(step);
                counter-increment: step;
                line-height: 30px;
                border: 2px solid #7d7d7d;
                display: block;
                text-align: center;
                margin: 0 auto 10px auto;
                border-radius: 50%;
                background-color: white;
            }
            .progressbar li:after {
                width: 100%;
                height: 2px;
                content: '';
                position: absolute;
                background-color: #7d7d7d;
                top: 15px;
                left: -50%;
                z-index: -1;
            }
            .progressbar li:first-child:after {
                content: none;
            }
            .progressbar li.active {
                color: green;
            }
            .progressbar li.active:before {
                border-color: #55b776;
                color: white;
                background-color: #55b776;
            }
            .progressbar li.active + li:after {
                background-color: #55b776;
            }
        </style>
    </head>
    <body>
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))
           <div class="alert alert-{{$msg}} alert-dismissible" style="margin-left: 800px; z-index: 99999; text-align: center; position: relative; top: 100px; position: fixed; width: 40%">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{Session::get($msg)}}
            </div>
           @endif
       @endforeach
        <!-- header start -->
        @include('components.header')
        <!-- header end -->
        <!-- content start -->
        @yield('content')
        <!-- content end -->

        <!-- footer start -->

        @include('components.footer')
        <!-- footer end -->

        <!-- JS -->
        <!-- jquery js -->

        <script src="{{asset('js/vendor/jquery-1.11.2.min.js')}}"></script>
        <!-- bootstrap js -->
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <!-- owl.carousel.min js -->
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
        <!-- slicknav js -->
        <script src="{{asset('js/jquery.slicknav.js')}}"></script>
        <!-- countdown js -->
        <script src="{{asset('js/jquery.countdown.min.js')}}"></script>
        <!-- price-slider js -->
        <script src="{{asset('js/price-slider.js')}}"></script>

        <script src="{{asset('js/jquery.number.js')}}"></script>
        <!-- jquery.scrollUp js -->
        <!-- jquery.collapse js -->
		<script src="{{asset('js/jquery.collapse.js')}}"></script>
        <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>
        <!-- Lib js -->
        <script src="{{asset('lib/rs-plugin/js/jquery.themepunch.plugins.min.js')}}"></script>
        <script src="{{asset('lib/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
        <script src="{{asset('lib/rs-plugin/rs.home.js')}}"></script>
        <!-- plugins js -->
        <!-- wow js -->
        <script src="{{asset('js/wow.js')}}"></script>
		<script>
			new WOW().init();
        </script>
        <!-- Google Map js -->
        <script src="https://maps.googleapis.com/maps/api/js"></script>

        <script src="{{asset('js/plugins.js')}}"></script>
        <!-- main js -->
        <script src="{{asset('js/main.js')}}"></script>
        @yield('quick') <!-- phải bỏ dưới link jquery-1.11.2.min.js -->
        @yield('script')
        @yield('update')
        @yield('timer')
        @yield('price')
        <script>
            var msg = '{{Session::get('alert')}}';
            var exist = '{{Session::has('alert')}}';
            if(exist){
              alert(msg);
            }
        </script>
    </body>
</html>
