<div style="float: left;
width: 249px;background-color: #fffff2;margin-left: 7px;height: 363px;">
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" style="margin-left: 50px;margin-top: 20px;">
            <ul class="list-unstyled components" style="line-height: 50px; font-family: 'Montserrat', sans-serif">
                <li class="sp">
                   Danh mục sản phẩm
                </li>
                @if($getCategoryList)
                @foreach($getCategoryList as $getCategorySingle)
                 <li class="cate">
                    <a href="{{route('get.list.product',[$getCategorySingle->c_slug,$getCategorySingle->id])}}" style="color: black">{{$getCategorySingle->c_name}}</a>
                 </li>
                 @endforeach
              @endif
            </ul>
        </nav>
    </div>
</div>
<div class="slider-wrap" style="float: left; width: 1090px; margin-bottom: 60px">
    <div class="fullwidthbanner-container" >
      <div class="fullwidthbanner1">
        <ul>
        <!-- SLIDE  -->
          <li data-transition="parallaxtoright,parallaxtoleft" data-slotamount="7" data-masterspeed="1000"  data-saveperformance="off" >
            <!-- MAIN IMAGE -->
            <img src="{{asset('img/slider/slider-1/slider1.jpg')}}"  alt="slider1"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
            <!-- LAYERS -->

            <!-- LAYER NR. 1 -->
            <div class="tp-caption sfl"
               data-x="334"
               data-y="68"
              data-speed="15000"
              data-start="1000"
              data-easing="easeOutExpo"
              data-elementdelay="0.1"
              data-endelementdelay="0.1"
               data-endspeed="300"

              style="z-index: 5;"><img src="{{asset('img/slider/slider-1/img-slider1.png')}}" alt="">
            </div>

            <!-- LAYER NR. 2 -->
            <div class="tp-caption title-11 customin tp-resizeme"
               data-x="652"
               data-y="161"
              data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:3;scaleY:3;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
              data-speed="10000"
              data-start="2000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.1"
              data-endelementdelay="0.1"
               data-endspeed="300"

              style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">{{-- Phong cách khẳng định cá tính riêng của bạn --}}
            </div>

            <!-- LAYER NR. 3 -->
            <div class="tp-caption title-2 customin tp-resizeme"
               data-x="655"
               data-y="197"
              data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
              data-speed="10000"
              data-start="3000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.1"
              data-endelementdelay="0.1"
               data-endspeed="300"

              style="z-index: 7; max-width: auto; max-height: auto; white-space: nowrap;">{{-- New trend  --}}
            </div>

            <!-- LAYER NR. 4 -->
            <div class="tp-caption title-3 customin tp-resizeme"
               data-x="661"
               data-y="316"
              data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
              data-speed="1000"
              data-start="4000"
              data-easing="easeOutExpo"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.1"
              data-endelementdelay="0.1"
               data-endspeed="300"

              style="z-index: 8; max-width: 480px; max-height: 78px; white-space: normal;">{{-- Một phong cách thời trang thể hiện phong cách riêng của bạn. --}}
            </div>

            <!-- LAYER NR. 5 -->
            <div class="tp-caption customin"
               data-x="950"
               data-y="400"
              data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:2;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
              data-speed="500"
              data-start="4500"
              data-easing="Power3.easeInOut"
              data-elementdelay="0.1"
              data-endelementdelay="0.1"
               data-endspeed="300"

              style="z-index: 9;"><a href="#" target="_blank"><img src="{{asset('img/slider/slider-1/shopping.jpg')}}" alt=""></a>
            </div>
          </li>
        <!-- SLIDE  -->
          <li data-transition="parallaxtoright,parallaxtoleft" data-slotamount="7" data-masterspeed="600"  data-saveperformance="off" >
            <!-- MAIN IMAGE -->
            <img src="{{asset('img/slider/slider-1/slider2.jpg')}}"  alt="slider2"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
            <!-- LAYERS -->

            <!-- LAYER NR. 1 -->
            <div class="tp-caption title-22 tp-fade tp-resizeme"
               data-x="350"
               data-y="150"
              data-speed="300"
              data-start="1500"
              data-easing="Power3.easeInOut"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.1"
              data-endelementdelay="0.1"
               data-endspeed="300"

              style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Phụ kiện thời trang
            </div>

            <!-- LAYER NR. 2 -->
            <div class="tp-caption home2-title-1 tp-fade tp-resizeme"
               data-x="355"
               data-y="209"
              data-speed="300"
              data-start="2500"
              data-easing="Power3.easeInOut"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.1"
              data-endelementdelay="0.1"
               data-endspeed="300"

              style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;">bán giảm giá
            </div>

            <!-- LAYER NR. 3 -->
            <div class="tp-caption home2-title-2 tp-fade tp-resizeme"
               data-x="351"
               data-y="283"
              data-speed="300"
              data-start="3500"
              data-easing="Power3.easeInOut"
              data-splitin="none"
              data-splitout="none"
              data-elementdelay="0.1"
              data-endelementdelay="0.1"
               data-endspeed="300"

              style="z-index: 7; max-width: ; max-height: ; white-space: nowrap;">Tiết kiệm đến 25% cho tất các đơn hàng trong tháng này!
            </div>

            <!-- LAYER NR. 4 -->
            <div class="tp-caption tp-fade"
               data-x="351"
               data-y="334"
              data-speed="300"
              data-start="4500"
              data-easing="Power3.easeInOut"
              data-elementdelay="0.1"
              data-endelementdelay="0.1"
               data-endspeed="300"

              style="z-index: 8;"><a href="#" target="_blank"><img src="{{asset('img/slider/slider-1/shopping.jpg')}}" alt=""></a>
            </div>
          </li>
           <li data-transition="parallaxtoright,parallaxtoleft" data-slotamount="7" data-masterspeed="600"  data-saveperformance="off" >
            <!-- MAIN IMAGE -->
            <img src="{{asset('img/slider/slider-1/slider3.jpg')}}"  alt="slider2"  data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
            <!-- LAYERS -->
            </div>
          </li>
        </ul>
      </div>
    </div>
    </div>
    <!-- promotion-area start -->
    <div class="promotion-area">
    <div class="container">
      <div class="row">
        <!-- single-promo start -->
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single-promo">
            <a href="#"><img src="{{asset('img/promotion/1.jpg')}}" alt="" /></a>
          </div>
        </div>
        <!-- single-promo end -->
        <!-- single-promo start -->
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single-promo">
            <a href="#"><img src="{{asset('img/promotion/2.jpg')}}" alt="" /></a>
          </div>
        </div>
        <!-- single-promo end -->
        <!-- single-promo start -->
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single-promo">
            <a href="#"><img src="{{asset('img/promotion/3.jpg')}}" alt="" /></a>
          </div>
        </div>
        <!-- single-promo end -->
      </div>
    </div>
  </div>

  <!-- promotion-area end -->
