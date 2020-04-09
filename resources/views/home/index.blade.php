@extends('layouts.app')
@section('content')
 <!-- HOME SLIDER -->
 <style>
    .timer .timerBlock {
        background: #F57D65 !important;
        text-transform: uppercase;
        font-weight: 400;
        font-size: 20px;
        color: #fff;
        width: 60px;
        display: block;
        margin-bottom: 30px;
     }
    .timer .timerChild{
        height: 30px;
        padding-top: 5px;
     }
 </style>
@include('components.slider')
<!-- HOME SLIDER END -->
	<!-- features-area start -->
  <div class="features-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="section-heading">
            <h3>Sản phẩm nổi bật</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="features-curosel">
          <!-- single-features start -->
          @if($getListHotAndActiveProduct)
            @foreach($getListHotAndActiveProduct as $getSingleHotAndActiveProduct)
              <div class="col-md-3">
                <div class="single-features">
                  @if($getSingleHotAndActiveProduct->pro_sale > 0)
                    <span class="sale-text">-{{$getSingleHotAndActiveProduct->pro_sale}}%</span>
                  @endif
                  <div class="product-img">
                  <a href="{{route('get.detail.product',[$getSingleHotAndActiveProduct->pro_slug,
                  $getSingleHotAndActiveProduct->id])}}">
                      <img style="width: 263px; height: 346px" class="first-img"
                      src="{{pare_url_file($getSingleHotAndActiveProduct->pro_avatar)}}" alt="" />
                      <img style="width: 263px; height: 346px" class="second-img"
                       src="{{pare_url_file($getSingleHotAndActiveProduct->pro_img)}}" alt="" />
                    </a>
                    <a class="modal-view" href="{{route('get.quickView.product',$getSingleHotAndActiveProduct->id)}}">
                        Quick View</a>

                  </div>
                  <?php
                        $averageRating = 0;
                        if ($getSingleHotAndActiveProduct->pro_total_rating > 0) {
                            $averageRating = $getSingleHotAndActiveProduct->pro_total_number/$getSingleHotAndActiveProduct->pro_total_rating;
                        }

                    ?>
                  <div class="product-content">
                    <div class="pro-rating">
                        @for ($i = 1; $i <= 5; $i++)
                        <a href="#"><i class="fa {{$i<=$averageRating ? 'fa-star' : 'fa-star-o'}}"></i></a>
                        @endfor
                    </div>
                    <h5><a href="#" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{mb_strtolower($getSingleHotAndActiveProduct->pro_name)}}</a></h5>
                    @if($getSingleHotAndActiveProduct->pro_sale > 0)
                      <span class="old-price">{{number_format($getSingleHotAndActiveProduct->pro_price,0,'','.')}} đ</span>
                      <span class="pro-price">{{get_cal_sale($getSingleHotAndActiveProduct->pro_price,
                      $getSingleHotAndActiveProduct->pro_sale)}} đ</span>
                    @else
                      <span class="pro-price">{{number_format($getSingleHotAndActiveProduct->pro_price,0,'','.')}} đ</span>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          @endif
          <!-- single-features end -->
        </div>
      </div>
    </div>
  </div>
  <!-- features-area end -->
<!-- just watch product start -->
<div class="features-area" id="renderViewProduct">

</div>
    <!-- just watch product end -->

 <!-- sản phẩm đã mua start -->
 @if (!empty($listProduct))
 <div class="features-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="section-heading">
            <h3>Sản phẩm cùng danh mục bạn đã mua</h3>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="features-curosel">
          <!-- single-features start -->
            @foreach($listProduct as $singleProduct)
              <div class="col-md-3">
                <div class="single-features">
                  @if($singleProduct->pro_sale > 0)
                    <span class="sale-text">-{{$singleProduct->pro_sale}}%</span>
                  @endif
                  <div class="product-img">
                  <a href="{{route('get.detail.product',[$singleProduct->pro_slug,
                  $singleProduct->id])}}">
                      <img style="width: 263px; height: 346px" class="first-img"
                      src="{{pare_url_file($singleProduct->pro_avatar)}}" alt="" />
                      <img style="width: 263px; height: 346px" class="second-img"
                       src="{{pare_url_file($singleProduct->pro_img)}}" alt="" />
                    </a>
                    <a class="modal-view" href="{{route('get.quickView.product',$singleProduct->id)}}">
                        Quick View</a>

                  </div>
                  <?php
                        $averageRating = 0;
                        if ($singleProduct->pro_total_rating > 0) {
                            $averageRating = $singleProduct->pro_total_number/$singleProduct->pro_total_rating;
                        }

                    ?>
                  <div class="product-content">
                    <div class="pro-rating">
                        @for ($i = 1; $i <= 5; $i++)
                        <a href="#"><i class="fa {{$i<=$averageRating ? 'fa-star' : 'fa-star-o'}}"></i></a>
                        @endfor
                    </div>
                    <h5><a href="#" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{mb_strtolower($singleProduct->pro_name)}}</a></h5>
                    @if($singleProduct->pro_sale > 0)
                      <span class="old-price">{{number_format($singleProduct->pro_price,0,'','.')}} đ</span>
                      <span class="pro-price">{{get_cal_sale($singleProduct->pro_price,
                      $singleProduct->pro_sale)}} đ</span>
                    @else
                      <span class="pro-price">{{number_format($singleProduct->pro_price,0,'','.')}} đ</span>
                    @endif
                  </div>
                </div>
              </div>
            @endforeach
          <!-- sản phẩm đã mua end -->
        </div>
      </div>
    </div>
  </div>
 @endif
  <!-- features-area end -->
  <!-- banner-area start -->
  @include('components.banner')
  <!-- banner-area end -->
  <!-- category-area start -->
  <div class="category-area">
    <div class="container">
      <div class="row">
        <div class="sale-curosel1">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="sale-title">
              <h3>Sản phẩm bán chạy</h3>
            </div>
            <div class="sale-curosel">
              @if ($productBestSells)
                  @foreach ($productBestSells as $productBestSell)
                     <!-- product start -->
                    <div class="single-features">
                        @if($productBestSell->pro_sale > 0)
                            <span class="sale-text">-{{$productBestSell->pro_sale}}%</span>
                        @endif
                        <div class="product-img">
                        <a href="{{route('get.detail.product',[$productBestSell->pro_slug,
                            $productBestSell->id])}}">
                            <img class="first-img" src="{{pare_url_file($productBestSell->pro_avatar)}}" style="width: 360px; height: 473px" alt="" />
                            <img class="second-img" src="{{pare_url_file($productBestSell->pro_img)}}" style="width: 360px; height: 473px" alt="" />
                        </a>
                        <a class="modal-view" href="{{route('get.quickView.product',$productBestSell->id)}}" >Quick View</a>
                        </div>
                        <?php
                        $averageSaleRating = 0;
                        if ($productBestSell->pro_total_rating > 0) {
                            $averageSaleRating = $productBestSell->pro_total_number/$productBestSell->pro_total_rating;
                            }

                        ?>
                        <div class="product-content">
                            <div class="pro-rating">
                                @for ($i = 1; $i <= 5; $i++)
                                <a href="#"><i class="fa {{$i<=$averageSaleRating ? 'fa-star' : 'fa-star-o'}}"></i></a>
                                @endfor
                            </div>
                        <h5><a href="#">{{$productBestSell->pro_name}}</a></h5>
                        @if($productBestSell->pro_sale > 0)
                        <span class="old-price">{{number_format($productBestSell->pro_price,0,'','.')}} đ</span>
                        <span class="pro-price">{{get_cal_sale($productBestSell->pro_price,
                        $productBestSell->pro_sale)}} đ</span>
                         @else
                         <span class="pro-price">{{number_format($productBestSell->pro_price,0,'','.')}} đ</span>
                         @endif
                        </div>
                    </div>
              <!-- product end -->
                  @endforeach
              @endif
            </div>
            <div id="timer" class="timer">
                <div class="timerBlock">
                    <div id="days" class="timerChild""></div>
                </div>
                <div class="timerBlock">
                    <div id="hours" class="timerChild""></div>
                </div>
                <div class="timerBlock">
                    <div id="minutes" class="timerChild""></div>
                </div>
                <div class="timerBlock">
                    <div id="seconds" class="timerChild""></div>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div class="category-tab">
            <div>

              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Nam</a></li>
              <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Nữ</a></li>
              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Trẻ em</a></li>
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="home">
                <div class="row">
                  <div class="category-curosel">
                    <div class="col-md-6">
                      <!-- single-category-tab start -->
                      @if($getListAscMans1)
                      @foreach($getListAscMans1 as $getSingleAscMan )
                      <div class="single-category-tab">
                        <div class="single-features">
                          <div class="product-img">
                            <a href="#">
                              <img class="first-img" src="{{pare_url_file($getSingleAscMan->pro_avatar)}}" alt="" style="width: 126px; height: 166px" />
                              <img class="second-img" src="{{pare_url_file($getSingleAscMan->pro_img)}}" alt="" style="width: 126px; height: 166px" />
                            </a>
                          </div>
                          <div class="product-content">
                            <div class="pro-rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <h5><a href="#">Phasellus vel hendrerit</a></h5>
                            <span class="pro-price">£55.00</span>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- single-category-tab end -->
                    </div>
                    <div class="col-md-6">
                      <!-- single-category-tab start -->
                      @if($getListDescMans1)
                      @foreach($getListDescMans1 as $getSingleDescMan )
                      <div class="single-category-tab">
                        <div class="single-features">
                          <div class="product-img">
                            <a href="#">
                              <img class="first-img" src="{{pare_url_file($getSingleDescMan->pro_avatar)}}" alt="" style="width: 126px; height: 166px" />
                              <img class="second-img" src="{{pare_url_file($getSingleDescMan->pro_img)}}" alt="" style="width: 126px; height: 166px" />
                            </a>
                          </div>
                          <div class="product-content">
                            <div class="pro-rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <h5><a href="#">Phasellus vel hendrerit</a></h5>
                            <span class="pro-price">£55.00</span>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- single-category-tab end -->
                    </div>
                    <div class="col-md-6">
                      <!-- single-category-tab start -->
                      @if($getListAscMans)
                      @foreach($getListAscMans as $getSingleAscMan )
                      <div class="single-category-tab">
                        <div class="single-features">
                          <div class="product-img">
                            <a href="#">
                              <img class="first-img" src="{{pare_url_file($getSingleAscMan->pro_avatar)}}" alt="" style="width: 126px; height: 166px" />
                              <img class="second-img" src="{{pare_url_file($getSingleAscMan->pro_img)}}" alt="" style="width: 126px; height: 166px" />
                            </a>
                          </div>
                          <div class="product-content">
                            <div class="pro-rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <h5><a href="#">Phasellus vel hendrerit</a></h5>
                            <span class="pro-price">£55.00</span>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- single-category-tab end -->
                    </div>
                    <div class="col-md-6">
                      <!-- single-category-tab start -->
                      @if($getListDescMans)
                      @foreach($getListDescMans as $getSingleDescMan )
                      <div class="single-category-tab">
                        <div class="single-features">
                          <div class="product-img">
                            <a href="#">
                              <img class="first-img" src="{{pare_url_file($getSingleDescMan->pro_avatar)}}" alt="" style="width: 126px; height: 166px" />
                              <img class="second-img" src="{{pare_url_file($getSingleDescMan->pro_img)}}" alt="" style="width: 126px; height: 166px" />
                            </a>
                          </div>
                          <div class="product-content">
                            <div class="pro-rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <h5><a href="#">Phasellus vel hendrerit</a></h5>
                            <span class="pro-price">£55.00</span>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- single-category-tab end -->
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="profile">
                 <div class="row">
                  <div class="category-curosel">
                    <div class="col-md-6">
                      <!-- single-category-tab start -->
                      @if($getListAscWomens1)
                      @foreach($getListAscWomens1 as $getSingleAscMan )
                      <div class="single-category-tab">
                        <div class="single-features">
                          <div class="product-img">
                            <a href="#">
                              <img class="first-img" src="{{pare_url_file($getSingleAscMan->pro_avatar)}}" alt="" style="width: 126px; height: 166px" />
                              <img class="second-img" src="{{pare_url_file($getSingleAscMan->pro_img)}}" alt="" style="width: 126px; height: 166px" />
                            </a>
                          </div>
                          <div class="product-content">
                            <div class="pro-rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <h5><a href="#">Phasellus vel hendrerit</a></h5>
                            <span class="pro-price">£55.00</span>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- single-category-tab end -->
                    </div>
                    <div class="col-md-6">
                      <!-- single-category-tab start -->
                      @if($getListDescWomens1)
                      @foreach($getListDescWomens1 as $getSingleDescMan )
                      <div class="single-category-tab">
                        <div class="single-features">
                          <div class="product-img">
                            <a href="#">
                              <img class="first-img" src="{{pare_url_file($getSingleDescMan->pro_avatar)}}" alt="" style="width: 126px; height: 166px" />
                              <img class="second-img" src="{{pare_url_file($getSingleDescMan->pro_img)}}" alt="" style="width: 126px; height: 166px" />
                            </a>
                          </div>
                          <div class="product-content">
                            <div class="pro-rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <h5><a href="#">Phasellus vel hendrerit</a></h5>
                            <span class="pro-price">£55.00</span>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- single-category-tab end -->
                    </div>
                    <div class="col-md-6">
                      <!-- single-category-tab start -->
                      @if($getListAscWomens)
                      @foreach($getListAscWomens as $getSingleAscMan )
                      <div class="single-category-tab">
                        <div class="single-features">
                          <div class="product-img">
                            <a href="#">
                              <img class="first-img" src="{{pare_url_file($getSingleAscMan->pro_avatar)}}" alt="" style="width: 126px; height: 166px" />
                              <img class="second-img" src="{{pare_url_file($getSingleAscMan->pro_img)}}" alt="" style="width: 126px; height: 166px" />
                            </a>
                          </div>
                          <div class="product-content">
                            <div class="pro-rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <h5><a href="#">Phasellus vel hendrerit</a></h5>
                            <span class="pro-price">£55.00</span>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- single-category-tab end -->
                    </div>
                    <div class="col-md-6">
                      <!-- single-category-tab start -->
                      @if($getListDescWomens)
                      @foreach($getListDescWomens as $getSingleDescMan )
                      <div class="single-category-tab">
                        <div class="single-features">
                          <div class="product-img">
                            <a href="#">
                              <img class="first-img" src="{{pare_url_file($getSingleDescMan->pro_avatar)}}" alt="" style="width: 126px; height: 166px" />
                              <img class="second-img" src="{{pare_url_file($getSingleDescMan->pro_img)}}" alt="" style="width: 126px; height: 166px" />
                            </a>
                          </div>
                          <div class="product-content">
                            <div class="pro-rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <h5><a href="#">Phasellus vel hendrerit</a></h5>
                            <span class="pro-price">£55.00</span>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- single-category-tab end -->
                    </div>
                  </div>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="messages">
                <div class="row">
                  <div class="category-curosel">
                    <div class="col-md-6">
                      <!-- single-category-tab start -->
                      @if($getListAscKids)
                      @foreach($getListAscKids as $getSingleAscMan )
                      <div class="single-category-tab">
                        <div class="single-features">
                          <div class="product-img">
                            <a href="#">
                              <img class="first-img" src="{{pare_url_file($getSingleAscMan->pro_avatar)}}" alt="" style="width: 126px; height: 166px" />
                              <img class="second-img" src="{{pare_url_file($getSingleAscMan->pro_img)}}" alt="" style="width: 126px; height: 166px" />
                            </a>
                          </div>
                          <div class="product-content">
                            <div class="pro-rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <h5><a href="#">Phasellus vel hendrerit</a></h5>
                            <span class="pro-price">£55.00</span>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- single-category-tab end -->
                    </div>
                    <div class="col-md-6">
                      <!-- single-category-tab start -->
                      @if($getListDescKids)
                      @foreach($getListDescKids as $getSingleDescMan )
                      <div class="single-category-tab">
                        <div class="single-features">
                          <div class="product-img">
                            <a href="#">
                              <img class="first-img" src="{{pare_url_file($getSingleDescMan->pro_avatar)}}" alt="" style="width: 126px; height: 166px" />
                              <img class="second-img" src="{{pare_url_file($getSingleDescMan->pro_img)}}" alt="" style="width: 126px; height: 166px" />
                            </a>
                          </div>
                          <div class="product-content">
                            <div class="pro-rating">
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                              <a href="#"><i class="fa fa-star"></i></a>
                            </div>
                            <h5><a href="#">Phasellus vel hendrerit</a></h5>
                            <span class="pro-price">£55.00</span>
                          </div>
                        </div>
                      </div>
                      @endforeach
                      @endif
                      <!-- single-category-tab end -->
                    </div>
                  </div>
                </div>
              </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- category-area end -->
  <!-- testimonial-area start -->
  <div class="testimonial-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="testimonial">
            <div class="single-testimonial">
              <!-- testimonial-list start -->
              <div class="testimonial-list">
                <div class="test-content">
                  <span><i class="fa fa-quote-left"></i></span>
                  <p>Integer tincidunt nisi libero, sed aliquet ipsum fermentum eu. Duis porta egestas tellus sed vestibulum. Nam euismod elit id dolor aliquet, ut blandit massa egestas</p>
                </div>
                <div class="test-img">
                  <img src="img/testimonial/2.jpg" alt="" />
                  <div class="test-author">
                    <span class="test-name">Katherine Sullivan</span>
                    <span class="test-title">CEO of SunPark</span>
                  </div>
                </div>
              </div>
              <!-- testimonial-list end -->
              <!-- testimonial-list start -->
              <div class="testimonial-list">
                <div class="test-content">
                  <span><i class="fa fa-quote-left"></i></span>
                  <p>Etiam rhoncus congue arcu sed interdum. Cras dolor diam, accumsan eu aliquam eu, luctus vehicula velit. Nam eget tortor ut felis fermentum sodales ac eu lacus</p>
                </div>
                <div class="test-img">
                  <img src="img/testimonial/1.jpg" alt="" />
                  <div class="test-author">
                    <span class="test-name">Elizabeth Taylor</span>
                    <span class="test-title">Designer of BootExperts</span>
                  </div>
                </div>
              </div>
              <!-- testimonial-list start -->

              <!-- testimonial-list start -->
              <div class="testimonial-list">
                <div class="test-content">
                  <span><i class="fa fa-quote-left"></i></span>
                  <p>Proin varius erat sed nibh eleifend, scelerisque aliquam sapien malesuada. Donec at eros ex. Etiam tempus ornare nibh vel gravida</p>
                </div>
                <div class="test-img">
                  <img src="img/testimonial/2.jpg" alt="" />
                  <div class="test-author">
                    <span class="test-name">Katherine Sullivan</span>
                    <span class="test-title">Customer</span>
                  </div>
                </div>
              </div>
              <!-- testimonial-list end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- testimonial-area end -->
  <!-- recent-post-area start -->
  <div class="recent-post-area">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h3>Bài viết mới nhất</h3>
          </div>
        </div>
        <div class="clear"></div>
        <div class="recent-post-curosel">

          <!-- recent-post start -->
          @if ($listArticles)
              @foreach ($listArticles as  $listArticle)
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="recent-post">
                    <div class="post-thumb">
                        <a href="{{route('get.detail.article',[$listArticle->a_slug,$listArticle->id])}}">
                            <img src="{{pare_url_file($listArticle->a_avatar)}}"
                             style="width: 360px; height: 215px" alt="" /></a>
                    </div>
                    <div class="post-info">
                        <span class="recent-post-date">{{date('jS F, Y', strtotime($listArticle->updated_at))}}
                        </span>
                    <h3 style="overflow: hidden;text-overflow: ellipsis; white-space: nowrap;">
                        <a href="{{route('get.detail.article',[$listArticle->a_slug,$listArticle->id])}}">
                        {{$listArticle->a_name}}</a></h3>
                    <p style="overflow: hidden;text-overflow: ellipsis; white-space: nowrap;">
                        {{$listArticle->a_description}}</p>
                        <a class="read-more" href="{{route('get.detail.article',
                        [$listArticle->a_slug,$listArticle->id])}}">Đọc thêm</a>
                        <span class="recent-comment"><a href="#"><i class="fa fa-comment-o">
                            </i> 0 bình luận</a></span>
                    </div>
                    </div>
                </div>
              @endforeach
          @endif
          <!-- recent-post start -->
        </div>
      </div>
    </div>
  </div>

  <!-- brand-area start -->
  @include('components.brand')
  <!-- brand-area end -->
  <!-- recent-post-area end -->
  <!-- QUICKVIEW PRODUCT -->
  <div id="quickview-wrapper">
      <!-- Modal -->
      <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                      <!-- .modal-product -->
                  </div>
                  <!-- .modal-body -->
              </div>
              <!-- .modal-content -->
          </div>
          <!-- .modal-dialog -->
      </div>
      <!-- END Modal -->
  </div>
  <!-- END QUICKVIEW PRODUCT -->
@stop
@section('quick')
  <script type="text/javascript">
    $(function(){
      $(".modal-view").click(function(e){
        e.preventDefault();
        let $this = $(this);
        let url = $this.attr('href');
        $(".modal-body").html('');// set lại phiên modal bằng rỗng
        $("#productModal").modal('show');
        $.ajax({
          url : url
        }).done(function(result){
            if(result)
            {
              $(".modal-body").append(result);
            }
        })
      })
    })
  </script>
@stop

{{-- hàm thời gian giảm dần ở sản phẩm bán chạy --}}

@section('timer')
   <script>
     function makeTimer() {

        //		var endTime = new Date("29 April 2018 9:56:00 GMT+01:00");
        //ngày kết thúc
        var endTime = new Date("15 june 2020 00:00:00  UTC+7:00");

        endTime = (Date.parse(endTime) / 1000);
       //Phương thức date parse() trong JavaScript Phân tích một biểu diễn chuỗi
       // của một ngày và thời gian và trả về biểu diễn mili giây
       //nội bộ của ngày đó từ nửa đêm ngày 1/1/1970 UTC.
        var now = new Date();
        now = (Date.parse(now) / 1000);

        var timeLeft = endTime - now;

        var days = Math.floor(timeLeft / 86400);
        //86400 giây/ngày
        console.log(days);
        var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
        //1 hour có 3600 giây
        var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
        var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
        // Phương thức Math. floor() sẽ làm tròn dưới số được cung cấp

        //if (hours < "10") { hours = "0" + hours; }
       // if (minutes < "10") { minutes = "0" + minutes; }
      //  if (seconds < "1") { seconds = "0" + seconds; }

        $("#days").html(days + "<p>Days</p>");
        $("#hours").html(hours + "<p>Hours</p>");
        $("#minutes").html(minutes + "<p>Min</p>");
        $("#seconds").html(seconds + "<p>Sec</p>");

        }

        setInterval(function() { makeTimer(); }, 1000);
        // thực hiện một đoạn mã Javascript tại một thời điểm nào đó trong tương lai.
        //cử 1000 mili giây(1s) là thực hiện hàm makeTimer một lần
    </script>
@endsection
@section('script')
    <script>

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        // //token thêm ở header dưới dạng meta
        //hàm scroll để show ra sản phẩm vừa xem
        $(document).ready(function(){
            let urlRenderViewProduct = "{{route('render.view.product')}}";
            $(window).scroll(function(){
                if ($(window).scrollTop() > 1200) {
                    //lấy danh sách id sản phẩm
                    products = sessionStorage.getItem('products');
                    products = $.parseJSON(products);
                    //hàm ajax xử lý dử liệu
                    $.ajax({
                        url : urlRenderViewProduct,
                        type: "POST",
                        data : {
                            listId : products
                        }
                    }).done(function(result){
                        $('#renderViewProduct').html('').append(result);
                    })
                }
            })
        })
    </script>
@endsection
