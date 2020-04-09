@extends('admin::layouts.master')
@section('content')
<div class="row">
    <div class="col-12 py-5">
      <h4>Trang tổng quan</h4>
      <p class="text-gray">Chào mừng, {{Auth::guard('admins')->user()->name}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
        <div class="grid">
        <div class="grid-body text-gray">
            <div class="d-flex justify-content-between">
            <p>{{$userCount}}</p>
            <p>thành viên</p>
            </div>
            <p class="text-black">THÀNH VIÊN</p>
            <div class="wrapper w-50 mt-4">
            <canvas height="45" id="stat-line_1"></canvas>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
        <div class="grid">
        <div class="grid-body text-gray">
            <div class="d-flex justify-content-between">
            <p>{{$productCount}}</p>
            <p>sản phẩm</p>
            </div>
            <p class="text-black">SẢN PHẨM</p>
            <div class="wrapper w-50 mt-4">
            <canvas height="45" id="stat-line_2"></canvas>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
        <div class="grid">
        <div class="grid-body text-gray">
            <div class="d-flex justify-content-between">
            <p>{{$articleCount}}</p>
            <p>bài viết</p>
            </div>
            <p class="text-black">BÀI VIẾT</p>
            <div class="wrapper w-50 mt-4">
            <canvas height="45" id="stat-line_3"></canvas>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
        <div class="grid">
        <div class="grid-body text-gray">
            <div class="d-flex justify-content-between">
            <p>{{$ratingCount}}</p>
            <p>đánh giá</p>
            </div>
            <p class="text-black">ĐÁNH GIÁ</p>
            <div class="wrapper w-50 mt-4">
            <canvas height="45" id="stat-line_4"></canvas>
            </div>
        </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-6 equel-grid">
        <div class="grid">
            <figure class="highcharts-figure">
                <div id="container"></div>
            </figure>
        </div>
    </div>
    <div class="col-lg-7 col-md-6 equel-grid">
        <div class="grid table-responsive">
        <table class="table table-stretched">
            <thead>
            <tr>
                <th>Tên khách hàng</th>
                <th>Email</th>
                <th>Số điện thoại</th>
            </tr>
            </thead>
            <tbody>
             @if (isset($users))
                 @foreach ($users as $user)
                 <tr>
                    <td>
                    {{$user->name}}
                    </td>
                    <td class="font-weight-medium">{{$user->email}}</td>
                    <td>
                        {{$user->phone}}
                    </td>
                </tr>
                 @endforeach
             @endif
            </tbody>
        </table>
        </div>
    </div>
    <div class="col-md-12 equel-grid">
        <div class="grid">
        <div class="grid-body py-3">
            <p class="card-title ml-n1">Đơn hàng mới nhất</p>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-sm">
            <thead>
                <tr class="solid-header">
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thời gian</th>
                </tr>
            </thead>
            <tbody>
                <?php $stt = 1; ?>
                @if (isset($transactions))
                    @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{$stt}}</td>
                        <td>{{isset($transaction->user->name) ? $transaction->user->name : 'N/A' }}</td>
                        <td>{{$transaction->tr_phone}}</td>
                        <td>{{$transaction->tr_address}}</td>
                        <td>{{$transaction->tr_total}}</td>
                        <td>
                            @if ($transaction->tr_status == 1)
                                <button class="btn btn-xs btn-success">Đã xử lý</button>
                            @else
                            <button class="btn btn-xs btn-default">Chờ xử lý</button>
                            @endif
                        </td>
                        <td>{{$transaction->updated_at}}</td>
                    </tr>
                    <?php $stt++; ?>
                    @endforeach
                @endif
            </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@stop
@section('script')
    <script>
       Highcharts.chart('container', {
            chart: {
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 30,
                    depth: 70
                }
            },
            title: {
                text: 'Biểu đồ doanh thu 3D '
            },
            plotOptions: {
                column: {
                    depth: 25
                }
            },
            xAxis: {
                categories: [" ","Ngày", " ","Tuần", " ","Tháng"],
                labels: {
                    skew3d: true,
                    style: {
                        fontSize: '16px'
                    }
                }
            },
            yAxis: {
                title: {
                    text: "Doanh số"
                }
            },
            series: [{
                name: 'Doanh thu',
                data: [null,{{$dayMoney}}, null,{{$weekMoney}}, null,{{$monthMoney}}]
            }]
        });
    </script>
@endsection
