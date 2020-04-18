@extends('user.main')
@section('content')
<div class="row">
    <div class="col-12 py-5">
    <h4>Quản lý tài khoản</h4>
    <p class="text-gray">Chào mừng {{Auth::user()->name}}</p>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-6 col-6 equel-grid">
    <div class="grid">
        <div class="grid-body text-gray">
        <div class="d-flex justify-content-between">
            <p>Tổng số</p>
            <p>{{$countTransaction}}</p>
        </div>
        <p class="text-black">Đơn hàng</p>
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
            <p>Tổng số</p>
            <p>{{$countRating}}</p>
        </div>
        <p class="text-black">Đánh giá</p>
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
            <p>Tổng số</p>
            <p>{{$countProduct}}</p>
        </div>
        <p class="text-black">Sản phẩm đã mua</p>
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
            <p>Tổng số</p>
            <p>{{$countUser}}</p>
        </div>
        <p class="text-black">Điểm tích lủy</p>
        <div class="wrapper w-50 mt-4">
            <canvas height="45" id="stat-line_4"></canvas>
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-12 equel-grid">
    <div class="grid">
        <div class="grid-body py-3">
        <p class="card-title ml-n1">Danh sách đơn hàng của bạn</p>
        </div>
        <div class="table-responsive">
        <table class="table table-hover table-sm">
            <thead>
            <tr class="solid-header">
                <th>STT</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Chi tiết đơn hàng</th>
                <th>Xuất pdf</th>
                <th>Thời gian</th>
            </tr>
            </thead>
            <tbody>
                <?php $stt=1; ?>
                @if($transactions)
                  @foreach($transactions as $transaction)
                    <tr>
                      <td>{{$stt}}</td>
                      <td style="width: 200px">{{$transaction->tr_address}}</td>
                      <td>{{$transaction->tr_phone}}</td>
                      <td>{{number_format($transaction->tr_total,0,'','.')}} VNĐ</td>
                      <td>
                        @if($transaction->tr_status == 1)
                          <a href="#" class="btn btn-xs btn-success">Đã xử lý</a>
                        @else
                          <a href="#" class="btn btn-xs btn-default">Chờ xử lý</a>
                        @endif
                      </td>
                      <td style="padding-left: 40px;">
                          <a href="{{route('get.show.detail.order.user',$transaction->id)}}">Chi tiết</a>
                      </td>
                      <td>
                        <a href="{{route('generate-pdf',$transaction->id)}}">
                            <div class="btn btn-xs btn-warning has-icon">
                                <i class="mdi mdi mdi-export"></i>Xuất</div>
                            </td>
                        </a>
                      <td>{{$transaction->created_at}}</td>
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
<div class="pull-right" style="margin-top: 50px">
    {{$transactions->links()}}
 </div>
@endsection
