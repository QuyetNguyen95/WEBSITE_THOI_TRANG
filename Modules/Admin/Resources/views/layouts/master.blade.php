
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Nguyễn Cương Quyết</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('theme_admin/css/theme.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>

    <style type="text/css">
        /* Style the list */
        .container {
                width: 1111px !important;
            }
        ul.breadcrumb {
        padding: 10px 16px;
        list-style: none;
        background-color: #eee;
        }

        /* Display list items side by side */
        ul.breadcrumb li {
        display: inline;
        font-size: 18px;
        }

        /* Add a slash symbol (/) before/behind each list item */
        ul.breadcrumb li+li:before {
        padding: 8px;
        color: black;
        content: "/\00a0";
        }

        /* Add a color to all links inside the list */
        ul.breadcrumb li a {
        color: #0275d8;
        text-decoration: none;
        }

        /* Add a color on mouse-over */
        ul.breadcrumb li a:hover {
        color: #01447e;
        text-decoration: underline;
        }
    </style>
</head>

<body class="animsition">
    <div class="page-wrapper">
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="{{\Request::route()->getName()== 'admin.dashboard' ? 'active' : ''}}">
                            <a class="js-arrow" href="{{route('admin.dashboard')}}">
                                <i class="fa fa-archive"></i>Trang tổng quan</a>
                        </li>
                        <li class="{{\Request::route()->getName()== 'admin.get.list.category' ? 'active' : ''}}">
                            <a href="{{route('admin.get.list.category')}}">
                                <i class="fa fa-book"></i>Danh mục</a>
                        </li>
                        <li class="{{\Request::route()->getName()== 'admin.get.list.product'? 'active' : ''}}">
                            <a href="{{route('admin.get.list.product')}}">
                                <i class="fa fa-table"></i>Sản phẩm</a>
                        </li>
                        <li class="{{\Request::route()->getName() == 'admin.get.list.article' ? 'active' : ''}}">
                            <a href="{{route('admin.get.list.article')}}">
                            <i class="fa fa-assistive-listening-systems"></i>Tin tức</a>   
                        </li>
                        <li>
                            <a href="calendar.html">
                            <i class="fa fa-check-square"></i>Đánh giá</a>
                        </li>
                        <li class="{{\Request::route()->getName() == 'admin.get.list.transaction' ? 'active' : ''}}">
                            <a href="{{route('admin.get.list.transaction')}}">
                                <i class="fa fa-bell"></i>Đơn hàng</a>
                        </li>
                         <li class="">
                            <a href="map.html">
                                <i class="fa fa-building"></i>Kho hàng</a>
                        </li>
                         <li class="{{\Request::route()->getName() == 'admin.get.list.user' ? 'active' : ''}}">
                            <a href="{{route('admin.get.list.user')}}">
                                <i class="  fa fa-child"></i>Thành viên</a>
                        </li>
                         <li class="{{\Request::route()->getName() == 'admin.get.list.contact' ? 'active' : ''}}">
                            <a href="{{route('admin.get.list.contact')}}">
                                <i class="fa fa-address-book"></i>Liên hệ</a>
                        </li>
                         <li class="{{\Request::route()->getName() == 'admin.get.list.static' ? 'active' : ''}}">
                            <a href="{{route('admin.get.list.static')}}">
                                <i class="fa fa-edit"></i>Page tĩnh</a>
                        </li>
                         <li>
                            <a href="map.html">
                                <i class="fa fa-heart"></i>Admin</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fa fa-hourglass-1"></i>Cập nhật mật khẩu</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
       @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has($msg))
           <div class="alert alert-{{$msg}} alert-dismissible" style="margin-left: 800px; z-index: 99999; text-align: center; position: relative; top: 100px; position: fixed; width: 40%">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
               {{Session::get($msg)}}
            </div>
           @endif
       @endforeach
        <div class="page-container">
            <header class="header-desktop">
                <div class="section__content section__content--p30" style="margin-left: 50px">
                   <h3> Admin</h3>
                </div>
                <div class="section__content section__content--p30 " style="margin-left: 1200px">
                    Logout
                </div>
            </header>
            @yield('content')
        </div>

    </div>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
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
</body>

</html>
<!-- end document-->
