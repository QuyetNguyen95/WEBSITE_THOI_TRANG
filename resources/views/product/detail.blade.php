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
            display: none;
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
		.list_star .rating_active, .pro-rating .active
		{
			color: #ff9705;
		}
        .rating .active{
        color:#ff9705;
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
    <div class="product-main-area" >
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
                            <a href="#"><img src="{{pare_url_file($getDetailProduct->pro_avatar)}}" style="height: 682px" alt="" /></a>
							</div>
							<div role="tabpanel" class="tab-pane" id="two">
                            <a href="#"><img src="{{pare_url_file($getDetailProduct->pro_img)}}" style="height: 682px" alt="" /></a>
							</div>
							<div role="tabpanel" class="tab-pane" id="three">
                            <a href="#"><img src="{{pare_url_file($getDetailProduct->pro_avatar)}}" style="height: 682px" alt="" /></a>
							</div>
							<div role="tabpanel" class="tab-pane" id="four">
                            <a href="#"><img src="{{pare_url_file($getDetailProduct->pro_img)}}" style="height: 682px" alt="" /></a>
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
                        <?php
                        $averageRating = 0;
                        if ($getDetailProduct->pro_total_rating > 0) {
                            $averageRating = $getDetailProduct->pro_total_number/$getDetailProduct->pro_total_rating;
                        }

                        ?>
						<div class="pro-rating">
                            @for ($i = 1; $i <= 5; $i++)
                            <a href="#"><i class="fa {{$i<=$averageRating ? 'fa-star' : 'fa-star-o'}}"></i></a>
                            @endfor
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
                        <div class="pro-shor-desc">
							<p>Lượt xem: {{$getDetailProduct->pro_view}}</p>
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
                            <a href="{{route('get.add.favourite.user',$getDetailProduct->id)}}" class="js-add-favourite">
                                <button type="button" style="margin-left: 27px;background-color: #fed700;">
                                    Yêu thích
                                </button>
                            </a>
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
							<li role="presentation" ><a href="#home" aria-controls="home"
								role="tab" data-toggle="tab" style="border-radius: 10px;">Mô tả</a></li>
							<li role="presentation"><a href="#information" aria-controls="information"
								role="tab" data-toggle="tab" style="border-radius: 10px;">Thông tin bổ sung</a></li>
							<li role="presentation" class="active"><a href="#profile" aria-controls="profile"
								role="tab" data-toggle="tab" style="border-radius: 10px;">Đánh giá</a></li>
						  </ul>

						  <!-- Tab panes -->
						  <div class="tab-content">
							<div role="tabpanel" class="tab-pane " id="home">
								<div class="product-page-tab-content">
									<p>{!!$getDetailProduct->pro_content!!}</p>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="information">
								<div class="product-page-tab-content">
									{!!$getDetailProduct->pro_addInfo!!}
								</div>
							</div>
							<div role="tabpanel" class="tab-pane active" id="profile">
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
													<span class="fa fa-star" style="font-size: 100px;display: block;color: #ff9705;margin: 0 auto;text-align: center;">
													</span><b style="position: absolute;
													top: 50%;left: 50%;transform: translateX(-50%) translateY(-50%);color: white;font-size: 17px;">{{$averageRating}}</b>
                                                </div>
                                                @if ($arrayRating)
                                                <div class="list_rating" style="width:60%;padding: 20px">
                                                    @foreach ($arrayRating as $key => $itemRating)
                                                    <?php
                                                        $ratingPercent = round($itemRating['total']/$getDetailProduct->pro_total_rating*100);
                                                    ?>
													<div class="item_rating" style="display: flex; margin: 0 20px; align-items: center;">
															<div style="width: 10%;font-size: 16px;">
																{{$key}}    <span class="fa fa-star"></span>
															</div>
															<div style="width: 70%; padding-right: 10px;">
																<span style="width: 100%;height: 6px; display: block; border: 1px solid #dedede;border-radius: 5px;">
																	<b style="width: {{$ratingPercent}}%;background-color: #f25800;display: block;height: 100%;border-radius: 5px;"></b>
																</span>
															</div>
															<div style="width: 20%">
                                                                <a href="" style="color: #777; font-size: 16px;">{{$itemRating['total']}} đánh giá</a>
                                                                <span>{{$ratingPercent}} %</span>
															</div>
                                                    </div>
                                                    @endforeach
												</div>
                                                @else
                                                <div class="list_rating" style="width:60%;padding: 20px">
                                                   @for ($i = 1; $i < 5; $i++)
													<div class="item_rating" style="display: flex; margin: 0 20px; align-items: center;">
															<div style="width: 10%;font-size: 16px;">
																{{$i}}    <span class="fa fa-star"></span>
															</div>
															<div style="width: 70%; padding-right: 10px;">
																<span style="width: 100%;height: 6px; display: block; border: 1px solid #dedede;border-radius: 5px;">
																	<b style="width: 0%;background-color: #f25800;display: block;height: 100%;border-radius: 5px;"></b>
																</span>
															</div>
															<div style="width: 20%">
                                                                <a href="" style="color: #777; font-size: 16px;">0 đánh giá</a>
                                                                <span>0 %</span>
															</div>
                                                    </div>
                                                    @endfor
												</div>
                                                @endif
												<div style="width: 20%;margin-left: 0px;">
													<a href="#" class="js_rating_action" style="color: white;
													width: 200px;background: #288ad6;padding: 10px;border-radius: 5px;font-size: 16px;">Gửi đánh giá của bạn</a>
												</div>

											</div>
											<div class="form_rating" style="display: none">
                                                <div style="display: flex; margin-top: 15px">
                                                    <p style="margin-bottom: 0px; font-size: 16px;">Chọn đánh giá của bạn </p>
                                                    <span style="margin: 0 15px; font-size: 16px" class="list_star">
                                                        @for ($i = 1; $i <=5; $i++)
                                                            <i class="fa fa-star" data-key="{{$i}}" style="padding: 0 3px;"></i>
                                                        @endfor
                                                    </span>
                                                    <span class="list_text"></span>
                                                    <input type="hidden" class="number_rating" value="">
                                                </div>
                                                <div>
                                                    <textarea name="" id="ra_content" cols="30" rows="10" class="form-control"></textarea>
                                                </div>
                                                <div>
                                                    <a href="{{route('post.rating.product',$getDetailProduct->id)}}" class="js_rating_product"
                                                    style="width: 150px; background: #288ad6;padding:
                                                    5px 10px; color: white;border-radius: 5px; font-size: 16px;">Gửi đánh giá</a>
                                                </div>
                                            </div>
                                            <div class="component_list_rating" style="margin-top: 20px;">
                                                <div class="comments-list" >
                                                    <ul><?php $stt = 1;?>
                                                        @if (isset($listRating))
                                                            @foreach ($listRating as $singleRating)
                                                            <input type="hidden" value="{{$stt}}" class="comment_number">
                                                            <?php $stt++; ?>
                                                            <li>
                                                                <div class="comments-details">
                                                                    <div class="comments-list-img">
                                                                        <img style="width: 50px; height: 50px;" src="{{$singleRating->user->avatar != NULL ?
                                                                        pare_url_file($singleRating->user->avatar):asset('img/blog/comments/1.jpg')}}" alt="" />
                                                                    </div>
                                                                    <div class="comments-content-wrap" style="font-size: 14px;">
                                                                        <div style="margin-bottom: 10px">
                                                                            <b><a href="#">{{$singleRating->user->name}}</a></b>
                                                                            <span style="color: #2ba832;"><i class="fa fa-check-circle-o"></i><span> Đã mua hàng tại website</span></span>
                                                                             </div>
                                                                        <div style="margin-bottom: 10px" class="rating">
                                                                            @for ($i = 1; $i <= 5; $i++)
                                                                                <i class="fa fa-star {{$i<=$singleRating->ra_number ? 'active' : ''}}"></i>
                                                                            @endfor
                                                                            <span>{{$singleRating->ra_content}}</span>
                                                                        </div>
                                                                        <div>
                                                                            <span class="post-time"><i class="fa fa-clock-o"></i> {{date("jS F, Y H:i:s", strtotime($singleRating->updated_at))}}</span>
                                                                            <a href="#" class="reply{{$singleRating->id}}">Thảo luận</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="threaded-comments{{$singleRating->id}}" style="display: none">
                                                                    <div class="form-group" style="display: flex">
                                                                        <textarea cols="20" rows="1" class="form-control" style="height: 42px; width: 87%; margin-left: 62px" id="re_comment{{$singleRating->id}}"></textarea>
                                                                        <a href="{{route('post.reply.comment.product',$singleRating->id)}}" class="postReply{{$singleRating->id}}" style="padding: 9px 10px;
                                                                            border: 1px solid #288ad6;background: #fff;color: #288ad6; font-size: 13px;
                                                                            border-radius: 4px;height: 42px;width: 44px;margin-top: 20px; margin-left: 36px;">Gửi</a>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            @if (isset($singleRating->replys))
                                                                @foreach ($singleRating->replys as $item)
                                                                <li class="threaded-comments">
                                                                    <div class="comments-details">
                                                                        <div class="comments-list-img">
                                                                            <img style="width: 50px; height: 50px;" src="{{$item->user->avatar != NULL ?
                                                                            pare_url_file($item->user->avatar):asset('img/blog/comments/1.jpg')}}" alt="" />
                                                                        </div>
                                                                        <div class="comments-content-wrap" style="font-size: 14px">
                                                                            <span style="font-weight: 600">
                                                                                {{$item->user->name}}
                                                                            </span>
                                                                            <p>{{$item->re_comment}}</p>
                                                                            <i class="fa fa-thumbs-o-up"></i> <span>Thích</span> <span>{{date("jS F, Y H:i:s", strtotime($item->updated_at))}}</span>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endforeach
                                                            @endif
                                                            @endforeach
                                                        @endif
                                                    </ul>
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
                                        <?php
                                            $averageRating = 0;
                                            if ($relateProduct->pro_total_rating > 0) {
                                                $averageRating = $relateProduct->pro_total_number/$relateProduct->pro_total_rating;
                                            }

                                        ?>
                                        <div class="pro-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                            <a href="#"><i class="fa {{$i<=$averageRating ? 'fa-star' : 'fa-star-o'}}"></i></a>
                                            @endfor
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
                                        <?php
                                        $averageRating = 0;
                                        if ($saleProduct->pro_total_rating > 0) {
                                            $averageRating = $saleProduct->pro_total_number/$saleProduct->pro_total_rating;
                                                }

                                            ?>
                                        <div class="pro-rating">
                                            @for ($i = 1; $i <= 5; $i++)
                                            <a href="#"><i class="fa {{$i<=$averageRating ? 'fa-star' : 'fa-star-o'}}"></i></a>
                                            @endfor
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
@section('script')
	<script>
        //PHẦN ĐÁNH GIÁ SẢN PHẨM
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            // //token thêm ở header dưới dạng meta

            //hàm chọn số sao đánh giá bàng mouseover
            $(function(){
                //lấy danh sách sao ra
                //   listStar là một object jQuery
                //  { 0: i.fa.fa-star
                //   1: i.fa.fa-star
                //   2: i.fa.fa-star
                //   3: i.fa.fa-star
                //   4: i.fa.fa-star
                let listStar = $('.list_star .fa');
                //list danh sách các list_text
                console.log(listStar)
                let listRatingText = {
                    1 : "Không thích",
                    2 : "Tạm được",
                    3 : "Bình thường",
                    4 : "Rất tốt",
                    5 : "Tuyệt vời quá"
                }

                listStar.mouseover(function(){
                    //lấy số sao từ data-key(1, 2,3,4,5 sao)
                    let number = $(this).attr('data-key');
                    //set value cho number_rating để gửi dang database
                    //number chạy từ 1->5
                    $('.number_rating').val(number);
                    //vòng lặp chọn sao
                    $.each(listStar,function(key,value){
                        if(key+ 1 <= number){
                            $(this).addClass('rating_active');
                        }
                        else{
                            $(this).removeClass('rating_active');
                        }
                    })

                    //show listRatingText ra
                    $('.list_text').text(listRatingText[number]).show();
                    //show() để show ra khối có display = none
                })
            })

            //hàm click vào thì ần hiện form đánh giá

           $(function(){
            $('.js_rating_action').click(function(e){
               e.preventDefault();// dừng sự kiện không để load lại trang

                $('.form_rating').slideToggle("slow");
            })
           })


           //hàm click vào ẩn hiện phần tra lời đánh giá

           $(function(){
               //hàm click vào ẩn hiện phần tra lời đánh giá
            @foreach ($listRating as $singleRating)
               $('.reply{{$singleRating->id}}').click(function(e){
                   e.preventDefault();
                    $('#threaded-comments{{$singleRating->id}}').slideToggle('slow');
                    let url = $(this).attr('href');
                    $('#reply-comments-details{{$singleRating->id}}').html('');
                   //hàm ajax xử lý gửi dử liệu, show comment
                    $.ajax({
                        url : url
                    }).done(function(result){
                            $('#reply-comments-details{{$singleRating->id}}').append(result);
                    })

                })
               @endforeach
           })


            //hàm gửi trả lời comment
            $(function(){
                @foreach ($listRating as $singleRating)
                $('.postReply{{$singleRating->id}}').click(function(e){
                   e.preventDefault();
                   //lấy nội dung
                   let re_comment = $('#re_comment{{$singleRating->id}}').val();

                   //lấy url
                   let url = $(this).attr('href');
                   //hàm ajax xử lý gửi dử liệu
                  $.ajax({
                      url : url,
                      type : "POST",
                      data: {
                          re_comment : re_comment
                      }
                  }).done(function(result){
                    if(result.code == 1){
                            //alert('Trả lời bình luận thành công');
                            location.reload();
                        }
                        else{
                            alert('Xin hãy đăng nhập trước khi tham gia thảo luận');
                            window.location.href="<?php echo url('/');?>/dang-nhap";
                        }
                  })
                })
                @endforeach
            })
           //hàm gửi đánh giá bằng ajax
           $(function(){
                $('.js_rating_product').click(function(e){
                    e.preventDefault();
                    let ra_number = $('.number_rating').val();//get value number
                    let ra_content = $('#ra_content').val();//get value content
                    let url = $(this).attr('href');//get url
                    //hàm xử lý ajax
                    $.ajax({
                        url: url,
                        type: "POST",
                        data:{
                            ra_number : ra_number,
                            ra_content : ra_content
                        }
                    }).done(function(result){
                        if(result.code == 1){
                            //alert('Gửi đánh giá thành công');
                            location.reload();
                        }
                        else{
                            alert('Xin hãy đăng nhập trước khi đánh giá');
                            window.location.href="<?php echo url('/');?>/dang-nhap";
                        }
                    })
                })
           })
           //hàm lưu sản phẩm yêu thích
           $(function(){
               $('.js-add-favourite').click(function(e){
                   e.preventDefault();
                   let url = $(this).attr('href');
                   //xử lý ajax
                   console.log(url);

                   $.ajax({
                       url: url,
                       type: "POST",
                   }).done(function(result){
                        if(result.messages)
                        {
                            alert(result.messages);
                        }
                        else
                        {
                            alert('Xin hãy đăng nhập trước khi yêu thích');
                        }
                   })
               })
           })
	</script>
@endsection

