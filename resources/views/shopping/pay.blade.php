@extends('layouts.app')
@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area product-breadcrumb" style="margin-top: 30px; margin-bottom: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb">
                    <ul>
                        <li><a href="{{route('home')}}">Trang chủ <i class="fa fa-angle-right"></i></a></li>
                        <li>Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb-area end -->
{{-- Step Progress bar  --}}
<div class="container1">
    <ul class="progressbar">
        <li class="active">Đăng nhập</li>
        <li class="active">Giỏ hàng</li>
        <li class="active">Nhập địa chỉ & thanh toán</li>
</ul>
</div>
 {{-- Step Progress bar  --}}
<!-- checkout-area start -->
<div class="checkout-area" style="margin-bottom: 100px;">
    <div class="container">
        <div class="row">
            <form action="" method="POST">
                @csrf
                <div class="col-lg-6 col-md-6">
                    <div class="checkbox-form">
                        <h3>Thông tin thanh toán</h3>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Họ và tên người nhận<span class="required">*</span></label>
                                    <input type="text" placeholder="Họ và tên của bạn" class="form-control" value="{{Auth::user()->name}}" name="name" readonly="readonly"  />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Địa chỉ người nhận<span class="required">*</span></label>
                                    <input type="text" placeholder="Địa chỉ của bạn" class="form-control"  name="address" value="{{Auth::user()->address}}"  />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Email người nhận<span class="required">*</span></label>
                                    <input type="email" placeholder="Email của bạn" class="form-control" required name="email" value="{{Auth::user()->email}}"  readonly="readonly" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Số điện thoại người nhận<span class="required">*</span></label>
                                    <input type="number" placeholder="Số điện thoại của bạn" class="form-control" required name="phone" value="{{Auth::user()->phone}}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="checkout-form-list">
                                    <label>Ghi chú </label>
                                    <textarea   cols="30" rows="10" class="form-control" placeholder="Hãy viết điều gì đó" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="your-order">
                        <h3>Giỏ hàng của bạn</h3><span><a href="{{route('show.products.shopping')}}" style="position: relative; top: -58px;left: 400px;
                            font-size: 18px; color: #6bcae0;">Cập nhật</a></span>
                        <div class="your-order-table table-responsive">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="product-name">Sản phẩm</th>
                                        <th class="product-total">Tạm tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($products)
                                        @foreach ($products as $product)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{$product->name}} <strong class="product-quantity"> × {{$product->qty}}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">{{number_format($product->price,0,'','.')}} đ</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                                <tfoot>
                                    <tr class="shipping">
                                        <th>Shipping</th>
                                        <td>
                                            <p style="color: #eb413e">Free Shipping</p>
                                        </td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Thành tiền</th>
                                        <td><strong><span class="amount">{{Cart::subtotal(0,'.','.')}} đ</span></strong>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <!-- ACCORDION START -->
                                <h3>Chuyển tiền trực tiếp qua ngân hàng</h3>
                                <div class="payment-content">
                                    <p>Thanh toán trực tiếp vào tài khoản ngân hàng của chúng tôi. Vui lòng sử dụng ID đơn hàng của bạn để thanh toán.
                                         Đơn hàng của bạn sẽ được vận chuyển cho đến khi tiền được xóa trong tài khoản của chúng tôi.</p>
                                </div>
                                <!-- ACCORDION END -->
                                <!-- ACCORDION START -->
                                <h3>Thanh toán qua séc</h3>
                                <div class="payment-content">
                                    <p>Vui lòng gửi séc của bạn đến đúng Tên Cửa hàng, Phố Cửa hàng, Thị trấn Cửa hàng,
                                         Cửa hàng Bang / Quận, Mã bưu điện của chúng tôi.</p>
                                </div>
                                <!-- ACCORDION END -->
                                <!-- ACCORDION START -->
                                <h3>PayPal <img src="img/cart/payment.png" alt="" /></h3>
                                <div class="payment-content">
                                    <p>Thanh toán qua PayPal; bạn có thể thanh toán bằng thẻ tín dụng nếu bạn không có tài khoản PayPal.</p>
                                </div>
                                <!-- ACCORDION END -->
                            </div>
                            <div class="order-button-payment">
                                <input type="submit" value="Đặt mua" />
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- checkout-area end -->
@stop
