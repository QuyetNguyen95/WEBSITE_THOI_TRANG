@extends('layouts.app')
@section('content')

<!-- breadcrumb-area start -->
<div class="breadcrumb-area product-breadcrumb" style="margin-top: 30px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{route('home')}}">Trang chủ <i class="fa fa-angle-right"></i></a></li>
                        <li>Giỏ hàng</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
<div class="cart-title-area" style="margin-top: -20px; margin-bottom: 30px">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="car-header-title">
                    <h2 style="font-size: 17px">Giỏ hàng <span style="font-size: 14px;">
                        ({{Cart::count()}} sản phẩm)</span></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area start -->
@if (Cart::count() > 0)
<div class="cart-main-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-content table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th class="product-name">Tên sản phẩm</th>
                                <th class="product-thumbnail">Hình ảnh</th>
                                <th class="product-price">Giá</th>
                                <th class="product-quantity">Số lượng</th>
                                <th class="product-price">Giảm giá</th>
                                <th class="product-subtotal">Thành tiền</th>
                                <th class="product-remove">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php $stt = 1; ?>
                                @if ($products)
                                    @foreach ($products as $product )
                                    <form action="{{route('quantity.products.shopping',
                                    [$product->rowId,$product->id])}}" method="POST" >
                                        @csrf
                                        <tr>
                                            <td>{{$stt}}</td>
                                        <td class="product-name" style="text-align: left;"><a href="#">{{$product->name}}</a>
                                            <ul style="margin-left: 10px;">
                                                <li>Color: {{$product->options->color}}</li>
                                                <li>Size: {{$product->options->size}}</li>
                                            </ul>
                                        </td>
                                        <td class="product-thumbnail"><a href="#"><img style="width: 105px; height: 140px;"
                                            src="{{pare_url_file($product->options->avatar)}}" alt="" /></a></td>
                                        <td class="product-price"><span class="amount">
                                            {{number_format($product->options->price_old,0,'','.')}} đ</span></td>
                                        <td class="product-quantity"><input class="qty" type="number" value="{{$product->qty}}" min="1" name="quantity" />

                                        </td>
                                        <td class="product-price"><span class="amount">{{$product->options->sale}} %</span></td>
                                        <td class="product-subtotal">{{number_format($product->price*$product->qty,0,'','.')}} đ</td>
                                        <td class="product-remove">
                                            <button type="submit" class="btn btn-xs" style=" margin-left: 6px;background-color: #919191;
                                            border-color: #919191; color: white;"><span>Update</span></button>
                                            <a href="{{route('delete.products.shopping',$product->rowId)}}">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    </form>
                                    <?php $stt++; ?>
                                    @endforeach
                                @endif
                            </form>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                        <div class="buttons-cart">
                            <a href="{{route('home')}}" style="background: #919191;color: white;
                                padding-left: 22px;padding-right: 22px;">Tiếp tục mua hàng</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-5">
                        <div class="cart_totals" style="border: 2px solid #83cbdc;
                        padding: 58px;border-radius: 50px 0px; margin-top: 50px;">
                            <h2 style="position: relative;left: -17%">Giỏ hàng</h2>
                            <table>
                                <tbody>
                                    <tr class="cart-subtotal">
                                        <th>giá tạm tính</th>
                                        <td><span class="amount">{{Cart::subtotal(0,'.','.')}} đ</span></td>
                                    </tr>
                                    <tr class="shipping">
                                        <th>Phí vận chuyển</th>
                                        <td>
                                            <p style="color: #eb413e;"> Free Shipping</p>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Thành tiền</th>
                                        <td>
                                            <strong><span class="amount">{{Cart::subtotal(0,'.','.')}} đ</span></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="wc-proceed-to-checkout">
                                <a href="{{route('get.pay.shopping')}}">Tiến hành thanh toán</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@else
<div style="margin-bottom: 500px;">
    <div class="col-md-12 col-sm-12">
        <div class="bg"  style="text-align: center;
        margin-bottom: 25px; margin-top: 25px;"><img src="{{asset('img/cow.jfif')}}" alt=""></div>
        <p style="text-align: center;">Không có sản phẩm nào trong giỏ hàng của bạn.</p>
        <div class="buttons-cart" style="margin-left: 570px;">
            <a href="{{route('home')}}" style="background: #919191;color: white;
                padding-left: 22px;padding-right: 22px;">Tiếp tục mua hàng</a>
        </div>
    </div>
</div>
@endif
<!-- cart-main-area end -->
@stop

