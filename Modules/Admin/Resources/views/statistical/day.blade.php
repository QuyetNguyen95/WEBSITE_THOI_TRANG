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
                        <a href="">Thống kê</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Theo ngày</li>
                    </ol>
                </nav>
            </div>
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-md-12" style="display: flex">
                    <h2 class="title-1">Thống kê theo ngày </h2>
                </div>
            </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Ngày</th>
                            <th>Lượt mua</th>
                            <th>Tổng tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; ?>
                            @if(isset($days))
                              @foreach($days as $day)
                                <tr>
                                  <td>{{$stt}}</td>
                                   <td>{{$day->date}}</td>
                                   <td>{{$day->count}} lượt</td>
                                   <td>{{number_format($day->sumDay,0,"",".")}} vnđ</td>
                                </tr>
                                <?php $stt++; ?>
                              @endforeach
                            @endif
                        </tbody>
                  </table>
                 <div>
                 </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
