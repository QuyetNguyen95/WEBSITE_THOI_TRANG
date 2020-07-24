@extends('user.main')
@section('content')
<style>
    .rating .active{
        color:#ff9705;
    }
</style>
<div class="row">
    <div class="col-12 py-5">
    <h4>Quản lý sản phẩm đã mua</h4>
    <p class="text-gray">Chào mừng {{Auth::user()->name}}</p>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-md-12 equel-grid">
            <div class="grid">
              <div class="grid-body py-3">
                <p class="card-title ml-n1" style="font-size: 16px;">Sản phẩm đã mua ({{$products->count()}} sản phẩm)</p>
              </div>
              <div class="table-responsive">
                @if ($products->count() > 0)
                <table class="table table-hover table-sm">
                    <thead>
                      <tr class="solid-header">
                        <th colspan="2" class="pl-4">Sản phẩm</th>
                        <th>Đánh giá</th>
                        <th>Nhận xét</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(isset($products))
                      @foreach($products as $product)
                      <tr>
                        <td class="pr-0 pl-4">
                          <a href="{{route('get.detail.product',[$product->pro_slug,
                              $product->id])}}">
                              <img class="profile-img img-sm" src="{{pare_url_file($product->pro_avatar)}}""
                              alt="profile image" style="width: 30px; height: 30px;">
                          </a>
                        </td>
                        <td class="pl-md-0">
                          <small class="text-black font-weight-medium d-block">
                              <span class="status-indicator rounded-indicator small bg-primary" style="display: inline-block;"></span>
                              <a href="{{route('get.detail.product',[$product->pro_slug,
                              $product->id])}}">{{mb_strtolower($product->pro_name)}}</a>
                              </small>
                          <span class="text-gray">
                            {{number_format($product->pro_price,0,'','.')}} đ </span>
                            <span>{{$product->pro_view}} lượt xem</span>
                        </td>
                        <td>
                          <?php
                          $averageRating = 0;
                          if ($product->pro_total_rating > 0) {
                              $averageRating = round($product->pro_total_number/$product->pro_total_rating,2);
                          }

                          ?>
                          <div class="rating" style="color: #999;display: initial;">
                              @for ($i = 1; $i <= 5; $i++)
                                  <i class="mdi mdi-star {{$i <= $averageRating ? 'active' : ''}}"></i>
                              @endfor
                              /{{$averageRating}}
                          </div>
                        </td>
                        <td>
                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}" style="margin-left: -25px;">
                              <button type="button" class="btn btn-sm btn-info">Viết nhận xét</button>
                            </a>
                        </td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                @else
                  <div style="margin-left: 35%; margin-top: 32px;margin-bottom: 50px;">
                      <img style="margin-bottom: 20px" src="{{asset('img/download.png')}}" alt="">
                      <p style="margin-bottom: 20px">Bạn chưa mua sản phẩm nào</p>
                      <a href="{{route('home')}}" style="padding: 11px;">
                        <button type="button" class="btn btn-success">Tiếp tục mua sắp</button>
                      </a>
                  </div>
                @endif

              </div>
            </div>
          </div>
    </div>
</div>
<div class="pull-right" style="margin-top: 50px">
    {{$products->links()}}
 </div>
@endsection

