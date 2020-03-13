@extends('layouts.app')
@section('content')
	<style>
		.list_star i:hover{
			cursor: pointer;
		}
		.list_text
		{
			display: inline-block;
			margin-left: 10px;
			position: relative;
			background: #52b858;
			color: #fff;
			padding: 2px 8px;
			box-sizing: border-box;
			font-size: 12px;
			border-radius: 2px;
		}
		.list_text:after{
			right: 100%;
			top: 50%;
			border: solid transparent;
			content: " ";
			height: 0;
			width: 0;
			position: absolute;
			pointer-events: none;
			border-color: rgba(82,184,88,0);
			border-right-color: #52b858;
			border-width: 6px;
			margin-top: -6px;
		}
	</style>
    <!-- breadcrumb-area start -->
	<div class="breadcrumb-area product-breadcrumb">
		<div class="container">
			<div class="breadcrumb">
				<ul>
					<li><a href="{{route('home')}}">Trang chủ <i class="fa fa-angle-right"></i></a></li>
                    <li><a href="{{route('get.list.product',[$category->c_slug,$category->id])}}">
                        {{$category->c_name}} <i class="fa fa-angle-right"></i></a></li>
                <li>{{$getDetailProduct->pro_name}}</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- breadcrumb-area end -->
	<!-- product-main-area start -->
	<div class="product-main-area">
		<div class="container">
			<div class="row">
				<!-- product-page-photo start -->
				<div class="col-lg-7 col-md-7 col-sm-12">
					<div class="product-page-photo">
					<div class="product-page-2-tab">
						<div>
						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#one" aria-controls="home" role="tab" data-toggle="tab">
                            <img src="{{pare_url_file($getDetailProduct->pro_avatar)}}" alt="" /></a></li>
							<li role="presentation"><a href="#two" aria-controls="two" role="tab" data-toggle="tab">
                                <img src="{{pare_url_file($getDetailProduct->pro_img)}}" alt="" /></a></li>
							<li role="presentation"><a href="#three" aria-controls="three" role="tab" data-toggle="tab">
                                <img src="{{pare_url_file($getDetailProduct->pro_avatar)}}" alt="" /></a></li>
							<li role="presentation"><a href="#four" aria-controls="four" role="tab" data-toggle="tab">
                                <img src="{{pare_url_file($getDetailProduct->pro_img)}}" alt="" /></a></li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="one">
                            <a href="#"><img src="{{pare_url_file($getDetailProduct->pro_avatar)}}" alt="" /></a>
							</div>
							<div role="tabpanel" class="tab-pane" id="two">
                            <a href="#"><img src="{{pare_url_file($getDetailProduct->pro_img)}}" alt="" /></a>
							</div>
							<div role="tabpanel" class="tab-pane" id="three">
                            <a href="#"><img src="{{pare_url_file($getDetailProduct->pro_avatar)}}" alt="" /></a>
							</div>
							<div role="tabpanel" class="tab-pane" id="four">
                            <a href="#"><img src="{{pare_url_file($getDetailProduct->pro_img)}}" alt="" /></a>
							</div>
						  </div>
						</div>
					</div>
					</div>
				</div>
				<!-- product-page-photo end -->
				<div class="col-lg-5 col-md-5 col-sm-12">
					<div class="product-page-content">
						<div class="pro-page-title">
							<h1 style="width: max-content;">{{$getDetailProduct->pro_name}}</h1>
						</div>
						<div class="product-page-rating">
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
							<a href="#"><i class="fa fa-star"></i></a>
						</div>
						<div class="stock-status">
                            @if ($getDetailProduct->pro_number > 0)
                                <p>Còn hàng</p>
                            @else
                                <p style="color: #e54d26;">Hết hàng</p>
                            @endif
						</div>
						<div class="product-page-price">
							@if ($getDetailProduct->pro_sale > 0)
								<span class="old-price">{{number_format($getDetailProduct->pro_price,0,'','.')}} đ</span>
								<span class="pro-price">{{get_cal_sale($getDetailProduct->pro_price,$getDetailProduct->
								pro_sale)}} đ</span>
							@else
								<span class="pro-price">{{number_format($getDetailProduct->pro_price,0,'','.')}} đ</span>
							@endif
						</div>
						<div class="pro-shor-desc">
							<p>{{$getDetailProduct->pro_description}}</p>
                        </div>
                    <form action="{{route('add.products.shopping',$getDetailProduct->id)}}" method="post">
                        @csrf
						<div class="product-page-select">
                            <label>Chọn size</label>
                            <?php $sizes = preg_split('/(-)/',$getDetailProduct->pro_size); ?>
                                <select name="size">
                                @foreach ($sizes as $size)
                                <option value="{{$size}}">{{$size}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="product-page-select">
                            <label>Chọn color</label>
                            <?php $colors = preg_split('/(-)/',$getDetailProduct->pro_color); ?>
                                <select name="color">
                                @foreach ($colors as $color)
                                <option value="{{$color}}">{{$color}}</option>
                                @endforeach
                            </select>
                        </div>
						<div class="product-total-cart">
                            <input type="number" value="1" min="1" name="qty"/>
                            @if ($getDetailProduct->pro_number > 0)
                            <button >
                                Thêm vào giỏ</button>
                            @else
                            <button type="button">Hết hàng</button>
                            @endif
            			</div>
						<div class="product-wishlist">
							<a href="#"><i class="fa fa-heart-o"></i></a>
							<a href="#"><i class="fa fa-toggle-off"></i></a>
						</div>
                        </form>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="product-share-icon">
						<a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
						<a class="twitter" href="#"><i class="fa fa-twitter"></i></a>
						<a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
						<a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a>
						<a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="product-tab">
						<div>
						  <!-- Nav tabs -->
						  <ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" aria-controls="home"
								role="tab" data-toggle="tab" style="border-radius: 10px;">Mô tả</a></li>
							<li role="presentation"><a href="#information" aria-controls="information"
								role="tab" data-toggle="tab" style="border-radius: 10px;">Thông tin bổ sung</a></li>
							<li role="presentation"><a href="#profile" aria-controls="profile"
								role="tab" data-toggle="tab" style="border-radius: 10px;">Đánh giá</a></li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="home">
								<div class="product-page-tab-content">
									<p>{!!$getDetailProduct->pro_content!!}</p>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="information">
								<div class="product-page-tab-content">
									{!!$getDetailProduct->pro_addInfo!!}
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="profile">
								<div class="product-page-comments">
									<h2>Xin hãy để lại một bình luận cho sản phẩm</h2>
									<ul>
										<li>
											<div class="product-comments">
												<img src="{{asset('img/quyet.jpg')}}" alt="" style="width: 50px; height: 50px;transform: rotate(87deg);" />
												<div class="product-comments-content">
													<p><strong>admin</strong> -
														<span>Ngày 20, Tháng 5, Năm 2020</span>
														<span class="pro-comments-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</span>
													</p>
													<div class="desc">
                                                        Quý khách có thắc mắc về sản phẩm hoặc dịch vụ của chúng tôi? Quý khách đang muốn khiếu nại hay phản hồi về đơn hàng đã mua? Xin hãy bình luận dưới đây.
													</div>
												</div>
											</div>
										</li>
									</ul>
									<div class="review-form-wrapper">
										<div class="component_rating">
											<h3>Đánh giá sản phẩm</h3>
											<div class="component_rating_content" style="display: flex; align-items: center;border-radius: 5px;
											border: 1px solid #dedede;">
												<div class="rating_item" style="width:20%; position: relative;">
													<span class="fa fa-star" style="font-size: 85px;display: block;color: #ff9705;margin: 0 auto;text-align: center;">
													</span><b style="position: absolute;
													top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;font-size: 17px;">2.89</b>
												</div>
												<div class="list_rating" style="width:70%;padding: 20px">
													@for ($i = 1; $i <=5; $i++)
													<div class="item_rating" style="display: flex; width: 405px; margin: 0 20px; align-items: center;">
															<div style="width: 10%">
																{{$i}}    <span class="fa fa-star"></span>
															</div>
															<div style="width: 70%; padding-right: 10px;">
																<span style="width: 100%;height: 6px; display: block; border: 1px solid #dedede;border-radius: 5px;">
																	<b style="width: 33%;background-color: #f25800;display: block;height: 100%;border-radius: 5px;"></b>
																</span>
															</div>
															<div style="width: 20%">
																<a href="" style="color: #777; font-size: 13px;">290 đánh giá</a>
															</div>
													</div>
													@endfor
												</div>
												<div style="width: 22%;margin-left: 0px;">
													<a href="#" class="js_rating_action" style="color: white;
													width: 200px;background: #288ad6;padding: 10px;border-radius: 5px;font-size: 13px;">Gửi đánh giá</a>
												</div>

											</div>
											<?php
												$listRatingText = [
													1 => "Không thích",
													2 => "Tạm được",
													3 => "Bình thường",
													4 => "Rất tốt",
													5 => "Tuyệt vời quá"
												];
											?>
											<div style="display: flex; margin-top: 15px">
												<p style="margin-bottom: 0px">Chọn đánh giá của bạn </p>
												<span style="margin: 0 15px;" class="list_star">
													@for ($i = 1; $i <=5; $i++)
														<i class="fa fa-star" style="padding: 0 3px;"></i>
													@endfor
												</span>
												<span class="list_text">Tốt</span>
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
    </div>
	<!-- product-main-area end -->
	<!-- features-area start -->
	<div class="features-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="section-heading">
						<h3>Những sản phẩm liên quan</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="features-curosel">
                    <!-- single-features start -->
                    @if ($relateProducts)
                        @foreach($relateProducts as $relateProduct)
                            <div class="col-md-3">
                                <div class="single-features">
                                    @if ($relateProduct->pro_sale > 0)
                                        <span class="sale-text">-{{$relateProduct->pro_sale}}%</span>
                                    @endif
                                    <div class="product-img">
                                        <a href="{{route('get.detail.product',
                                        [$relateProduct->pro_slug,$relateProduct->id])}}">
                                            <img class="first-img" src="{{pare_url_file($relateProduct->pro_avatar)}}"
                                            style="width: 263px; height: 346px" alt="">
                                            <img class="second-img" src="{{pare_url_file($relateProduct->pro_img)}}"
                                            style="width: 263px; height: 346px" alt="">
                                        </a>
                                        <a class="modal-view" href="{{route('get.quickView.product',$relateProduct->id)}}">Quick View</a>
                                        <div class="action-buttons">
                                            <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i>
                                                 <span>Thêm vào giỏ</span></a>
                                            <a class="favourite" href="#"><i class="fa fa-heart-o"></i></a>
                                            <a class="compare" href="{{route('get.detail.product',[$relateProduct->pro_slug,
                                            $relateProduct->id])}}"><i class="fa fa-toggle-off"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="pro-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                        </div>
                                    <h5><a href="{{route('get.detail.product',[$relateProduct->pro_slug,$relateProduct->id])}}"
                                         style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                         {{$relateProduct->pro_name}}</a></h5>
                                        @if ($relateProduct->pro_sale > 0)
                                            <span class="old-price">{{number_format($relateProduct->pro_price,0,'','.')}} đ
                                            </span>
                                            <span class="pro-price">{{get_cal_sale($relateProduct->pro_price,
                                            $relateProduct->pro_sale)}} đ</span>
                                        @else
                                            <span class="pro-price">{{number_format($relateProduct->pro_price,0,'','.')}} đ
                                            </span>
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
    <!-- features-area start -->
	<div class="features-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<div class="section-heading">
						<h3>Sản phẩm giảm giá sốc</h3>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="features-curosel">
                    <!-- single-features start -->
                    @if ($saleProducts)
                        @foreach ($saleProducts as $saleProduct)
                            <div class="col-md-3">
                                <div class="single-features">
                                    <span class="sale-text">-{{$saleProduct->pro_sale}}%</span>
                                    <div class="product-img">
                                        <a href="{{route('get.detail.product',[$saleProduct->pro_slug,$saleProduct->id])}}">
                                        <img class="first-img" src="{{pare_url_file($saleProduct->pro_avatar)}}"
                                         alt="" style="width: 263px; height: 346px">
                                        <img class="second-img" src="{{pare_url_file($saleProduct->pro_img)}}"
                                         alt="" style="width: 263px; height: 346px">
                                        </a>
                                    <a class="modal-view" href="{{route('get.quickView.product',$saleProduct->id)}}">
                                        Quick View</a>
                                        <div class="action-buttons">
                                            <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i> <span>
                                                Thêm vào giỏ</span></a>
                                            <a class="favourite" href="#"><i class="fa fa-heart-o"></i></a>
                                            <a class="compare" href="{{route('get.detail.product',
                                            [$saleProduct->pro_slug,$saleProduct->id])}}"><i class="fa fa-toggle-off"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="pro-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                        </div>
                                        <h5><a href="{{route('get.detail.product',[$saleProduct->pro_slug,$saleProduct->id])}}"
                                        style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;
                                        }">{{$saleProduct->pro_name}}</a></h5>
                                        <span class="old-price">{{number_format($saleProduct->pro_price,0,'','.')}} đ
                                        </span>
                                        <span class="pro-price">{{get_cal_sale($saleProduct->pro_price,
                                        $saleProduct->pro_sale)}} đ</span>
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
      <!-- QUICKVIEW PRODUCT -->
  <div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
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

