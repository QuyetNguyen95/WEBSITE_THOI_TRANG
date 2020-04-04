<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>User</title>
    <!-- plugins:css -->
    {{-- PHẦN LIBRARY CỦA USER --}}
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('theme_user/vendors/iconfonts/mdi/css/materialdesignicons.css')}}">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('theme_user/css/shared/style.css')}}">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="{{asset('theme_user/css/demo_1/style.css')}}">
    <!-- Layout style -->
    <link rel="shortcut icon" href="{{asset('theme_user/images/favicon.ico')}}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- PHẦN LIBRARY CỦA USER --}}
    <style>
        .error-text{
            font-style: italic;
            color: red;
            margin-top: 3px;
        }
    </style>
  </head>
  <body class="header-fixed">
    <!-- partial:partials/_header.html -->
    <nav class="t-header">
      <div class="t-header-brand-wrapper">
        <a href="index.html">
            <a href="{{route('home')}}"><img src="{{asset('img/logo/logo.png')}}" alt="" style="width: 200px;" /></a>
        </a>
      </div>
      <div class="t-header-content-wrapper">
        <div class="t-header-content">
          <ul class="nav ml-auto">
            <li class="nav-item dropdown">
                <a href="{{route('home')}}" style="color: #7e95a7;font-size: 18px;font-weight: 600;">Thoát</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- partial -->
    <div class="page-body">
        <!-- partial:partials/_sidebar.html -->
        <div class="sidebar">
          <div class="user-profile">
            <div class="display-avatar animated-avatar">
               @if (Auth::user()->avatar == NULL)
               <img class="profile-img img-lg rounded-circle" src="{{asset('img/avatar_2x.png')}}"
               alt="profile image" style="width: 80px; height: 80px">
               @else
               <img class="profile-img img-lg rounded-circle" src="{{pare_url_file(Auth::user()->avatar)}}"
               alt="profile image" style="width: 80px; height: 80px">
               @endif
            </div>
            <div class="info-wrapper">
              <p class="user-name">{{Auth::user()->name}}</p>
            </div>
          </div>
          <ul class="navigation-menu">
            <li class="{{Request::url() == route('get.index.user') ? 'active' : ''}}">
              <a href="{{route('get.index.user')}}">
                <span class="link-title">Trang tổng quan</span>
                <i class="mdi mdi-gauge link-icon"></i>
              </a>
            </li>
            <li class="{{Request::url() == route('get.update.user') ? 'active' : ''}}">
                <a href="{{route('get.update.user')}}">
                  <span class="link-title">Thông tin</span>
                  <i class="mdi mdi-account-card-details link-icon"></i>
                </a>
            </li>
            <li class="{{Request::url() == route('get.just.watch.user') ? 'active' : ''}}">
                <a href="{{route('get.just.watch.user')}}">
                  <span class="link-title">Sản phẩm vừa xem</span>
                  <i class="mdi mdi-heart link-icon"></i>
                </a>
            </li>
            <li class="{{Request::url() == route('get.best.sell.user') ? 'active' : ''}}">
                <a href="{{route('get.best.sell.user')}}">
                  <span class="link-title">Sản phẩm bán chạy</span>
                  <i class="mdi mdi-bell-ring link-icon"></i>
                </a>
            </li>
          </ul>
        </div>
        <!-- partial -->
        <div class="page-content-wrapper">
            <div class="page-content-wrapper-inner">
                <div class="content-viewport">
                @yield('content')
                </div>
            </div>
            <!-- content viewport ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer" >
                <div class="row">
                <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
                    <small class="text-muted d-block">Copyright © 2010 <a href="http://www.uxcandy.co" target="_blank">LUCLYBOY</a>. All rights reserved</small>
                </div>
                </div>
            </footer>
            <!-- partial -->
            </div>
        <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- SCRIPT LOADING START FORM HERE /////////////-->
    <!-- plugins:js -->
    {{-- PHẦN LIBRARY CỦA USER --}}
    <script src="{{asset('js/vendor/jquery-1.11.2.min.js')}}"></script>
    <!-- plugins:js -->
    <script src="{{asset('theme_user/vendors/js/core.js')}}"></script>
    <!-- endinject -->
    <!-- Vendor Js For This Page Ends-->
    <script src="{{asset('theme_user/vendors/apexcharts/apexcharts.min.js')}}"></script>
    <!-- Vendor Js For This Page Ends-->
    <script src="{{asset('theme_user/vendors/chartjs/Chart.min.js')}}"></script>

    <!-- build:js -->
    <script src="{{asset('theme_user/js/template.js')}}"></script>
    <script src="{{asset('theme_user/js/dashboard.js')}}"></script>
    <!-- endbuild -->
    {{-- PHẦN LIBRARY CỦA USER --}}
    @yield('script')
  </body>
</html>
