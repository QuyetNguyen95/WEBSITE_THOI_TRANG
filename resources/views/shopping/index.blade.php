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
 {{-- Step Progress bar  --}}
<div class="container1">
    <ul class="progressbar">
        <li class="active">Đăng nhập</li>
        <li>Giỏ hàng</li>
        <li>Nhập địa chỉ & thanh toán</li>
</ul>
</div>
 {{-- Step Progress bar  --}}
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
                                    <form action="" method="POST" >
                                        @csrf
                                        <tr>
                                            <td>{{$stt}}</td>
                                        <td class="product-name" style="text-align: left;"><a href="{{route('get.detail.product',[$product->options->slug,$product->id])}}">{{$product->name}}</a>
                                            <ul style="margin-left: 10px;">
                                                <li>Color: {{$product->options->color}}</li>
                                                <li>Size: {{$product->options->size}}</li>
                                            </ul>
                                        </td>
                                        <td class="product-thumbnail"><a href="#"><img style="width: 105px; height: 140px;"
                                            src="{{pare_url_file($product->options->avatar)}}" alt="" /></a></td>
                                        <td class="product-price"><span class="amount">
                                            {{number_format($product->options->price_old,0,'','.')}} đ</span></td>
                                        <td class="product-quantity"><input class="qty{{$product->id}}" type="number" value="{{$product->qty}}" min="1" name="quantity" />

                                        </td>
                                        <td class="product-price"><span class="amount">{{$product->options->sale}} %</span></td>
                                        <td class="product-subtotal"><span id="price{{$product->id}}" data-price="{{$product->price}}" class="loopTable">{{$product->price*$product->qty}}</span> đ</td>
                                        <td class="product-remove">
                                            <a href="{{route('quantity.products.shopping')}}" id="updateCart{{$product->id}}" data-rowId="{{$product->rowId}}" data-number="{{$product->options->number}}">
                                                <i class="fa fa-refresh"></i>
                                            </a>
                                            <a href="{{route('delete.products.shopping')}}" class="deleteCart" data-rowId="{{$product->rowId}}">
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
                                        <td><span class="amount1">{{Cart::subtotal(0,'.','.')}}</span> đ</td>
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
                                            <strong><span class="amount" id="amount">{{Cart::subtotal(0,'.','.')}} đ</span></strong>
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
@section('update')
    <script>
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });
            // //token thêm ở header dưới dạng meta


            $(document).ready(function(){
                //HÀM UPDATE SỐ LƯỢNG SẢN PHẨM'
                @foreach($products as $product)
                    $('#updateCart{{$product->id}}').click(function(e){
                        e.preventDefault();
                        //lấy số lượng sản phẩm theo id của sản phẩm
                        let qty = $('.qty{{$product->id}}').val();//int
                        //lấy rowId của sản phẩm
                        let rowId = $(this).attr('data-rowId');
                        //lấy url của từng sản phẩm
                        let url = $(this).attr('href');
                         //lấy giá của sản phẩm
                        let price = $('#price{{$product->id}}').attr('data-price');
                        let pro_number = $(this).attr('data-number');//string
                        console.log(pro_number,qty);
                        if(qty > parseInt(pro_number))
                        {
                            location.reload();
                            alert('Sản phẩm đã hết hàng');
                        }else if(qty > 5)
                        {
                            location.reload();
                            alert('Bạn chỉ được mua tối đã 5 sản phẩm');
                        }
                        else{
                             // tính lại giá của từng sản phẩm
                             $('#price{{$product->id}}').text(price*qty);

                             //dùng vòng lặp each tính lại giá của tổng các sản phẩm
                            let subtotal = 0;
                            $('.loopTable').each(function (index, value) {
                                subtotal += parseInt($(this).text());
                            });
                            //giá tạm tính
                            $('.amount1').text($.number(subtotal,0,'','.'));

                            //thành tiền
                            $('#amount').text($.number(subtotal,0,'','.') + " Đ");
                            //hàm $.number() là thư viện format number trong jquery (jquery.number.js)

                             //hàm ajax xử lý dữ liệu
                                $.ajax({
                                url : url ,
                                type: "POST",
                                data: {
                                    qty : qty,
                                    rowId : rowId
                                }
                            }).done(function(result){
                                if(result.code == 1)
                                {
                                    console.log(result);
                                }
                            })
                        }
                    })
                @endforeach

                //HÀM XÓA SẢN PHẨM TRONG GIỎ HÀNG
                $('.deleteCart').click(function(e){
                    e.preventDefault();
                    //lấy đường dẩn url
                    let url = $(this).attr('href');
                    //lấy rowId của sản phẩm
                    let rowId = $(this).attr('data-rowId');
                   //hàm ajax xử lý dữ liệu
                   $.ajax({
                        url : url ,
                        type: "POST",
                        data: {
                            rowId : rowId
                        }
                    }).done(function(result){
                        if(result.code == 1)
                        {
                            location.reload();
                            console.log(result);
                        }
                    })
                })
            })
    </script>
@endsection

