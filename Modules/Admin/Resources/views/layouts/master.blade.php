<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
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
    {{-- PHẦN LIBRARY CỦA USER --}}
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <style type="text/css">
        #container {
        height: 400px;
        }

        .highcharts-figure, .highcharts-data-table table {
        min-width: 310px;
        max-width: 800px;
        margin: 1em auto;
        }

        .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
        }
        .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
        }
        .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
        background: #f1f7ff;
        }

        .table tbody tr td, table tbody tr td{
            vertical-align: top;
        }
        .table th, .table td, table th, table td {
            white-space: normal;
        }


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
          <img class="logo" src="{{asset('img/logo/logo.png')}}"  style="width: 200px" alt="">
        </a>
      </div>
      @include('admin::components.header')
    </nav>
    <!-- partial -->
    <div class="page-body">
      <!-- partial:partials/_sidebar.html -->
      <div class="sidebar">
        <div class="user-profile">
          <div class="display-avatar animated-avatar">
            @if (Auth::guard('admins')->user()->avatar == NULL)
            <img class="profile-img img-lg rounded-circle" src="{{asset('img/avatar_2x.png')}}"
            alt="profile image" style="width: 80px; height: 80px">
            @else
            <img class="profile-img img-lg rounded-circle" src="{{pare_url_file(Auth::guard('admins')->user()->avatar)}}"
            alt="profile image" style="width: 80px; height: 80px">
            @endif
          </div>
          <div class="info-wrapper">
            <p class="user-name">{{Auth::guard('admins')->user()->name}}</p>
          </div>
        </div>
        <ul class="navigation-menu">
          <li class="{{\Request::url() == 'admin.dashboard' ? 'active' : ''}}">
            <a href="{{route('admin.dashboard')}}">
              <span class="link-title">Trang tổng quan</span>
              <i class="mdi mdi-gauge link-icon"></i>
            </a>
          </li>
          <li class="{{\Request::url() == 'admin.get.list.category' ? 'active' : ''}}">
            <a href="{{route('admin.get.list.category')}}">
              <span class="link-title">Danh mục</span>
              <i class="mdi mdi-bookmark link-icon"></i>
            </a>
          </li>
          <li class="{{\Request::url() == 'admin.get.list.product' ? 'active' : ''}}">
            <a href="{{route('admin.get.list.product')}}">
              <span class="link-title">Sản phẩm</span>
              <i class="mdi mdi-briefcase link-icon"></i>
            </a>
          </li>
          <li class="{{\Request::url() == 'admin.get.list.rating' ? 'active' : ''}}">
            <a href="{{route('admin.get.list.rating')}}">
              <span class="link-title">Đánh giá</span>
              <i class="mdi mdi-heart link-icon"></i>
            </a>
          </li>
          <li class="{{\Request::url() == 'admin.get.list.article' ? 'active' : ''}}">
            <a href="{{route('admin.get.list.article')}}">
              <span class="link-title">Tin tức</span>
              <i class="mdi mdi-file-document link-icon"></i>
            </a>
          </li>
          <li class="{{\Request::url() == 'admin.get.list.transaction' ? 'active' : ''}}">
            <a href="{{route('admin.get.list.transaction')}}">
              <span class="link-title">Đơn hàng</span>
              <i class="mdi mdi-cart link-icon"></i>
            </a>
          </li>
          <li class="{{\Request::url() == 'admin.get.list.warehouse' ? 'active' : ''}}">
            <a href="{{route('admin.get.list.warehouse')}}">
              <span class="link-title">Kho hàng</span>
              <i class="mdi mdi-home-map-marker link-icon"></i>
            </a>
          </li>
          <li class="{{\Request::url() == 'admin.get.list.user' ? 'active' : ''}}">
            <a href="{{route('admin.get.list.user')}}">
              <span class="link-title">Thành viên</span>
              <i class="mdi mdi-account-multiple-outline link-icon"></i>
            </a>
          </li>
          <li class="{{\Request::url() == 'admin.get.list.static' ? 'active' : ''}}">
            <a href="{{route('admin.get.list.static')}}">
              <span class="link-title">Page tĩnh</span>
              <i class="mdi mdi-assistant link-icon"></i>
            </a>
          </li>
        </ul>
      </div>
      @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has($msg))
         <div class="alert alert-{{$msg}} alert-dismissible" style="margin-left: 800px; z-index: 99999; text-align: center; position: relative; top: 100px; position: fixed; width: 40%">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
             {{Session::get($msg)}}
          </div>
         @endif
     @endforeach
      <!-- partial -->
      <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
          <div class="content-viewport">
            @yield('content')
          </div>
        </div>
        <!-- content viewport ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer" style="margin-left: 231px;">
            <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
              <small class="text-muted d-block">Copyright © 2020 <a href="http://www.uxcandy.co" target="_blank">LUCKYBOY</a>. All rights reserved</small>
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
    {{-- phần biểu đồ --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    {{-- PHẦN LIBRARY CỦA USER --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#output_img').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#output_img2').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    @yield('script')
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
          alert(msg);
        }
    </script>
  </body>
</html>
