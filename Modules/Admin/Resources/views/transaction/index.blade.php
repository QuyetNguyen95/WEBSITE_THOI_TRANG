@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <div class="viewport-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb has-arrow">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.get.list.transaction')}}">Đơn hàng</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                    </ol>
                </nav>
            </div>
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-md-12" style="display: flex">
                    <h2 class="title-1">Quản lý đơn hàng </h2>
                </div>
            </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tên kháng hàng</th>
                            <th>Địa chỉ</th>
                            <th style="width: 114px">Số điện thoại</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Time</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; ?>
                            @if($transactions)
                              @foreach($transactions as $transaction)
                                <tr>
                                  <td>{{$stt}}</td>
                                  <td style="width: 190px">{{isset($transaction->user->name) ? $transaction->user->name : 'N/A'}}</td>
                                  <td style="width: 200px">{{$transaction->tr_address}}</td>
                                  <td>{{$transaction->tr_phone}}</td>
                                  <td>{{number_format($transaction->tr_total,0,'','.')}} VNĐ</td>
                                  <td>
                                    @if($transaction->tr_status == 1)
                                      <a href="#" class="btn btn-xs btn-success">Đã xử lý</a>
                                    @else
                                      <a href="{{route('admin.get.action.transaction',['status',$transaction->id])}}" class="btn btn-xs btn-default">Chờ xử lý</a>
                                    @endif
                                  </td>
                                  <td>{{$transaction->created_at}}</td>
                                  <td style="padding-left: 0px;">
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                        <a href="{{route('admin.get.action.transaction',['delete',$transaction->id])}}"> <i class="text-info mdi mdi-delete"></i></a>
                                    </button>
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                        <a href="{{route('admin.get.view.transaction',$transaction->id)}}"> <i class="text-info mdi mdi-eye"></i></a>
                                    </button>
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                        <a href="{{route('admin.generate-pdf',$transaction->id)}}"> <i class="text-info mdi mdi mdi-export"></i></a>
                                    </button>
                                  </td>
                                </tr>
                                <?php $stt++; ?>
                              @endforeach
                            @endif
                        </tbody>
                  </table>
                 <div>
                    {{$transactions->links()}}
                 </div>
               </div>
            </div>
        </div>
    </div>
</div>
@stop

