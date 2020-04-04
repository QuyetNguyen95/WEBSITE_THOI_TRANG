<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="section-heading">
            <h3>Sản phẩm vừa xem</h3>
            </div>
        </div>
    </div>
    <div class="row">
        <div>
            <!-- single-features start -->
            @if($justWatchProducts)
            @foreach($justWatchProducts as $justWatchProduct)
                <div class="col-md-3">
                <div class="single-features">
                    @if($justWatchProduct->pro_sale > 0)
                    <span class="sale-text">-{{$justWatchProduct->pro_sale}}%</span>
                    @endif
                    <div class="product-img">
                    <a href="{{route('get.detail.product',[$justWatchProduct->pro_slug,
                    $justWatchProduct->id])}}">
                        <img style="width: 263px; height: 346px" class="first-img"
                        src="{{pare_url_file($justWatchProduct->pro_avatar)}}" alt="" />
                        <img style="width: 263px; height: 346px" class="second-img"
                        src="{{pare_url_file($justWatchProduct->pro_img)}}" alt="" />
                    </a>
                    </div>
                    <?php
                        $averageRating = 0;
                        if ($justWatchProduct->pro_total_rating > 0) {
                            $averageRating = $justWatchProduct->pro_total_number/$justWatchProduct->pro_total_rating;
                        }

                    ?>
                    <div class="product-content">
                    <div class="pro-rating">
                        @for ($i = 1; $i <= 5; $i++)
                        <a href="#"><i class="fa {{$i<=$averageRating ? 'fa-star' : 'fa-star-o'}}"></i></a>
                        @endfor
                    </div>
                    <h5><a href="#" style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{mb_strtolower($justWatchProduct->pro_name)}}</a></h5>
                    @if($justWatchProduct->pro_sale > 0)
                        <span class="old-price">{{number_format($justWatchProduct->pro_price,0,'','.')}} đ</span>
                        <span class="pro-price">{{get_cal_sale($justWatchProduct->pro_price,
                        $justWatchProduct->pro_sale)}} đ</span>
                    @else
                        <span class="pro-price">{{number_format($justWatchProduct->pro_price,0,'','.')}} đ</span>
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
