@if(isset($product))
<div class="modal-product">
    <div class="product-images">
        <div class="main-image images">
            <img alt="" src="{{pare_url_file($product->pro_avatar)}}" style="width: 319px; height:420px ">
        </div>
    </div>
    <!-- .product-images -->
    <div class="product-info">
        <h1>{{$product->pro_name}}</h1>
        <div class="price-box">
            <p class="price"><span class="special-price"><span class="amount">{{number_format($product->pro_price,0,'','.')}} đ</span></span></p>
        </div>
        <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}" class="see-all">Xem chi tiết  sản phẩm</a>
        <div class="quick-add-to-cart">
            <form  class="cart" action="{{route('add.products.shopping',$product->id)}}" method="post">
                @csrf
                <div class="product-page-select" style="margin-top: -22px;margin-bottom: 20px;">
                    <?php $sizes = preg_split('/(-)/',$product->pro_size); ?>
                        <select name="size" style="width: 80px;display: inline;">
                        @foreach ($sizes as $size)
                        <option value="{{$size}}">{{$size}}</option>
                        @endforeach
                    </select>
                    <?php $colors = preg_split('/(-)/',$product->pro_color); ?>
                        <select name="color" style="width: 80px;display: inline;">
                        @foreach ($colors as $color)
                        <option value="{{$color}}">{{$color}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="numbers-row">
                    <input type="number" id="french-hens" value="1" name="qty" min="1">
                </div>
                @if ($product->pro_number > 0)
                <button class="single_add_to_cart_button" type="submit" class="add">
                    Thêm vào giỏ</button>
                @else
                <button class="single_add_to_cart_button" type="button">Hết hàng</button>
                @endif
            </form>
        </div>
        <div class="quick-desc">
           {{$product->pro_description}}
        </div>
        <div class="social-sharing">
            <div class="widget widget_socialsharing_widget">
                <h3 class="widget-title-modal">Chia sẽ sản phẩm</h3>
                <ul class="social-icons">
                    <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                    <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
                    <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                    <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                    <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- .product-info -->
</div>
@endif

