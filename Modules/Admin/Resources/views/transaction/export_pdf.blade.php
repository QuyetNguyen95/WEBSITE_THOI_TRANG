<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
         body {
                font-family: DejaVu Sans, sans-serif;
                font-size: 10px;
            }

            table {
            border-collapse: collapse;
            width: 150%;
            margin-left: -80px;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 4px;
            }
    </style>
</head>
<body>
    <div class="head">
    <span style="margin-left: 70%">Mẫu số {{rand(1000000,9999999)}}</span>
     <h3 style="margin: 0 auto;width: 26%;">HÓA ĐƠN BÁN HÀNG</h3>
     <div style="margin-left: 70%">
        <p style="line-height: 1px;">Ký hiệu:...</p>
        <p style="line-height: 1px;">Số:...</p>
        <p>Ngày...Tháng...Năm 2020</p>
     </div>
     <div class="introduce" style="display: flex">
        <div class="left" style="margin-left: 15%">
            <p>Đơn vị mua hàng: {{isset($transaction->user->name) ? $transaction->user->name : 'N/A'}}</p>
            <p>Mã số thuế:..............</p>
            <p>Địa chỉ: {{$transaction->tr_address}}</p>
            <p>Điện thoại: {{$transaction->tr_phone}}</p>
        </div>
        <div class="right" style="margin-left: 65%">
            <p>Đơn vị bán hàng: Cửa hàng bán áo quần orianna</p>
            <p>Mã số thuế: {{rand(100,999)}}AA{{rand(100,999)}}</p>
            <p>Địa chỉ: Triệu Lăng, Triệu Phong, Quảng Trị</p>
            <p>Điện thoại: 0942926840</p>
        </div>
     </div>
    </div>
    <div class="body" style="margin: 0 auto;width: 50%; margin-top: -125px">
        @if (count($orders) > 0)
        @if(isset($orders))
        <table class="table">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th style="padding-left: 30px;">Giá</th>
                <th>Giá sale</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                @foreach($orders as $key => $order)
            <tr>
                <td>{{$i}}</td>
                <td>
                    {{isset($order->product->pro_name) ? $order->product->pro_name : ''}}
                </td>
                <td>
                    <ul style="list-style-type: none; margin-left: -41px;">
                        <li>Color: {{$order->or_color}}</li>
                        <li>Size: {{$order->or_size}}</li>
                    </ul>
                </td>
                <td>{{number_format($order->or_price,0,',','.')}} đ</td>
                <td>{{number_format($order->or_price*(1-$order->product->pro_sale/100),0,',','.')}} đ</td>
                <td style="padding-left: 33px;">{{$order->or_qty}}</td>
                <td>{{number_format($order->or_price*(1-$order->product->pro_sale/100)*$order->or_qty,0,',','.')}}đ</td>
            </tr>
            <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
        @endif
        @endif
    </div>
    <div class="footer" style="display: flex" >
        <div class="left" style="margin-left: 15%; margin-top: 20px">
            <p>Người mua hàng</p>
            <p style="font-style: italic">(Ký rõ họ tên)</p>
            <br>
            <p>{{isset($transaction->user->name) ? $transaction->user->name : 'N/A'}}</p>
        </div>
        <div class="right" style="margin-left: 80%">
            <p>Người bán hàng</p>
            <p style="font-style: italic">(Ký rõ họ tên)</p>
            <br>
            <p>Nguyễn Cương Quyết</p>
        </div>
    </div>
</body>
</html>
