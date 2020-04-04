<header>
    <!-- header-top-area start -->
    <div class="header-top-area">
      <div class="container">
        <div class="row">
          <!-- header-social-icon start -->
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="header-social-icon">
              <a href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" title="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" title="tumblr"><i class="fa fa-tumblr"></i></a>
              <a href="#" title="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" title="dribbble"><i class="fa fa-dribbble"></i></a>
            </div>
            <div class="email-content">
              <span>nguyencuongquyet96@gmail.com</span>
            </div>
          </div>
          <!-- header-social-icon end -->
          <!-- header-top-menu start -->
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <div class="header-top-menu">
              <ul class="navbar-nav mr-auto">
                @if(Auth::check())
              <li  class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i> {{Auth::user()->name}}</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="min-width:150px; text-align:center;">
                  <a class="dropdown-item" href="{{route('get.index.user')}}">Tài khoản của bạn</a>
                </div>
            </li>
              <li><a href="{{route('get.logout')}}">Đăng xuất</a></li>
                @else
                <li><a href="{{route('get.login')}}">Đăng nhập</a></li>
                <li><a href="{{route('get.register')}}">Đăng ký</a></li>
                @endif
              </ul>
            </div>
          </div>
          <!-- header-top-menu end -->
        </div>
      </div>
    </div>
    <!-- header-top-area end -->
    <!-- header-mid-area start -->
    <div class="header-mid-area">
      <div class="container">
        <div class="row">
          <!-- logo start -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="logo">
              <a href="{{route('home')}}"><img src="{{asset('img/logo/logo.png')}}" alt="" /></a>
            </div>
          </div>
          <!-- logo end -->
          <!-- cat-search start -->
          @include('components.cart')

          <!-- cat-search start -->
        </div>
      </div>
    </div>
    <!-- header-mid-area end -->
    <!-- mainmenu-area start -->
    <div class="mainmenu-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="mainmenu">
              <nav>
                <ul>
                  <li><a href="{{route('home')}}">Trang chủ</a>
                  </li>
                  <li><a href="">Sản phẩm <span><i class="fa fa-caret-down"></i></span></a>
                    <div class="mega-menu">
                      <span>
                        <a class="mega-menu-title" href="#">Hot Category</a>
                        @if($getCategoryList)
                          @foreach($getCategoryList as $getCategorySingle)
                            <a href="{{route('get.list.product',[$getCategorySingle->c_slug,$getCategorySingle->id])}}">{{$getCategorySingle->c_name}}</a>
                           @endforeach
                        @endif
                      </span>
                    </div>
                  </li>
                <li><a href="{{route('get.list.article')}}">Tin tức</a>
                  </li>
                  <li><a href="{{route('get.action.static',['ve-chung-toi',1])}}">Giới thiệu</a></li>
                  <li><a href="{{route('get.contact')}}">Liên hệ</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <!-- mobile menu start -->
        <div class="row">
          <div class="col-md-12">
            <div class="mobile-menu">
              <nav>
                <ul id="mobile-menu">
                  <li><a href="{{route('home')}}">Trang chủ</a>
                  </li>
                  <li><a href="#">Sản phẩm</a>
                    <ul>
                      <li><a href="#">Hot Category</a>
                        <ul>
                          <li>
                            @if($getCategoryList)
                              @foreach($getCategoryList as $getCategorySingle)
                                <a href="{{route('get.list.product',[$getCategorySingle->c_slug,$getCategorySingle->id])}}">{{$getCategorySingle->c_name}}</a>
                               @endforeach
                            @endif
                          </li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li><a href="{{route('get.list.article')}}">Tin tức</a>
                  </li>
                  <li><a href="{{route('get.action.static',['ve-chung-toi',1])}}">Giới thiệu</a>
                  </li>
                  <li><a href="{{route('get.contact')}}">Liên hệ</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <!-- mobile menu end -->
      </div>
    </div>
    <!-- mainmenu-area end -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5e7b68bf69e9320caabce35c/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
  </header>
