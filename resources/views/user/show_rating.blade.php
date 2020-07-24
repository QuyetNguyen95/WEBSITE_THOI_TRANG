@extends('user.main')
@section('content')
<style>
    .rating .active{
        color:#ff9705;
    }
</style>
<div class="row">
    <div class="col-12 py-5">
    <h4>Quản lý đánh giá sản phẩm</h4>
    <p class="text-gray">Chào mừng {{Auth::user()->name}}</p>
    </div>
</div>
<div>
   @if ($ratings->count() > 0)
   <div class="row">
    <div class="col-md-12 equel-grid">
        <div class="grid">
          <div class="grid-body py-3">
            <p class="card-title ml-n1" style="font-size: 16px;">Đánh giá sản phẩm ({{$ratings->count()}} đánh giá)</p>
          </div>
          @if (isset($ratings))
              @foreach ($ratings as $item)
              <div class="row">
                <div class="col-md-2">
                   <a href="{{route('get.detail.product',[$item->product->pro_slug,$item->product->id])}}">
                    <img src="{{pare_url_file($item->product->pro_avatar)}}" alt="no image" style="width: 90px;height: 90px;
                    margin-left: 40px; margin-bottom: 30px; margin-top: 20px;">
                   </a>
                </div>
                <div class="col-md-8" style="margin-top: 20px">
                    <a href="{{route('get.detail.product',[$item->product->pro_slug,$item->product->id])}}">{{$item->product->pro_name}}</a>
                    <p>{{$item->created_at}}</p>
                    <p style="display: contents">
                        <span>Hài lòng</span>
                        <div class="rating" style="color: #999;display: initial;">
                            @for ($i = 1; $i <= 5; $i++)
                            <i class="mdi mdi-star {{$i<=$item->ra_number ? 'active' : ''}}"></i>
                            @endfor
                        </div>
                    </p>
                    <p>{{$item->ra_content}}</p>
                </div>
              </div>
              @endforeach
          @endif
        </div>
      </div>
</div>
   @else
   <div style="margin-left: 35%; margin-top: 32px;margin-bottom: 50px;">
    <img style="margin-bottom: 20px" src="{{asset('img/download.png')}}" alt="">
    <p style="margin-bottom: 20px; margin-left: -129px;">Viết nhận xét với sản phẩm bạn đã sử dụng để cung cấp thông tin hữu ích cho mọi người</p>
    <a href="{{route('home')}}" style="padding: 11px;">
      <button type="button" class="btn btn-success">Tiếp tục mua sắp</button>
    </a>
    </div>
   @endif
</div>
@endsection

