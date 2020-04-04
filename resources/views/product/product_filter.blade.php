<!-- single-features start -->
@if(isset($listProduct))
@foreach($listProduct as $singleProduct)
   <div class="col-md-4 col-sm-4">
      <div class="single-features">
         @if($singleProduct->pro_sale > 0)
            <span class="sale-text">-{{$singleProduct->pro_sale}}%</span>
         @endif
         <div class="product-img">
            <a href="{{route('get.detail.product',[$singleProduct->pro_slug,$singleProduct->id])}}">
               <img class="first-img" src="{{pare_url_file($singleProduct->pro_avatar)}}"
                alt="" style="width: 262px; height: 345px;" />
               <img class="second-img" src="{{pare_url_file($singleProduct->pro_img)}}"
                alt="" style="width: 262px; height: 345px;" />
            </a>
            <a class="modal-view" href="{{route('get.quickView.product',$singleProduct->id)}}" >Quick View</a>
            <div class="action-buttons">
               <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i> <span>Thêm vào giỏ</span></a>
               <a class="favourite" href="#"><i class="fa fa-heart-o"></i></a>
               <a class="compare" href="{{route('get.detail.product',
               [$singleProduct->pro_slug,$singleProduct->id])}}"><i class="fa fa-toggle-off"></i></a>
            </div>
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
            <h5><a href="{{route('get.detail.product',[$singleProduct->pro_slug,$singleProduct->id])}}"
                style="text-overflow: ellipsis; overflow: hidden;white-space: nowrap;">
                {{$singleProduct->pro_name}}</a></h5>
            @if($singleProduct->pro_sale > 0)
               <span class="old-price">{{number_format($singleProduct->pro_price,0,'','.')}} đ</span>
               <span class="pro-price">{{get_cal_sale($singleProduct->pro_price,$singleProduct->pro_sale)}} đ</span>
            @else
               <span class="pro-price">{{number_format($singleProduct->pro_price,0,'','.')}} đ</span>
            @endif
         </div>
      </div>
   </div>
@endforeach
@endif


<!-- single-features end -->
