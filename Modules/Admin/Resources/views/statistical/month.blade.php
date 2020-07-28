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
                    <li class="breadcrumb-item active" aria-current="page">Theo tháng</li>
                    </ol>
                </nav>
            </div>
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-md-12" style="display: flex">
                    <h2 class="title-1">Thống kê theo tháng</h2>
                </div>
            </div>
            </div>
            <div class="row" style="margin-bottom: 30px">
                <div class="col-md-6">
                   <form class="form-inline" method="get" action="">
                     <div class="form-group" style="margin-left: 10px;margin-right: 10px;">
                        <select name="month" id="" class="form-control">
                            <option value="">Chọn tháng</option>
                            @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ Request::get('month') == $i ? 'selected' : '' }}>{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}</option>
                            @endfor
                        </select>
                     </div>
                    <div class="form-group" style="margin-left: 10px;margin-right: 10px;">
                        <select name="year" id="" class="form-control">
                            <option value="">Chọn năm</option>
                            @for ($i = 2010; $i <= 2020; $i++)
                            <option value="{{ $i }}" {{ Request::get('year') == $i ? 'selected' : '' }}>{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                  <button type="submit" class="btn btn-sm btn-outline-info"><i class="mdi mdi-magnify"></i></button>
                </form>
                </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Tháng</th>
                            <th>Lượt mua</th>
                            <th>Tổng tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; ?>
                            @if(isset($months))
                              @foreach($months as $month)
                                <tr>
                                  <td>{{$stt}}</td>
                                   <td>{{$month->m}}</td>
                                   <td>{{$month->count}} lượt</td>
                                   <td>{{number_format($month->sumMonth,0,"",".")}} vnđ</td>
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
