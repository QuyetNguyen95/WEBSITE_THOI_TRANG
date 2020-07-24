@extends('user.main')
@section('content')
<style>
    .rating .active{
        color:#ff9705;
    }
</style>
<div class="row">
    <div class="col-12 py-5">
    <h4>Quản lý sản phẩm mua sau</h4>
    <p class="text-gray">Chào mừng {{Auth::user()->name}}</p>
    </div>
</div>
<div>
    <div class="row">
        <div class="col-md-12 equel-grid">
            <div class="grid">
              <div class="grid-body py-3">
                <p class="card-title ml-n1" style="font-size: 16px;">Sản phẩm mua sau ({{$products->count()}} sản phẩm)</p>
              </div>
              <div class="table-responsive">
                @if ($products->count() > 0)
                <table class="table table-hover table-sm">
                    <thead>
                      <tr class="solid-header">
                        <th colspan="2" class="pl-4">Sản phẩm</th>
                        <th>Sale</th>
                        <th>Đánh giá</th>
                        <th>Đặt hàng</th>
                        <th>Bỏ đã xem</th>
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
                          <small>Giảm {{$product->pro_sale}}%</small>
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
                        <form action="{{route('add.products.shopping.user',$product->id)}}" method="POST">
                            @csrf
                          <td>
                               <button class="btn btn-sm btn-success" type="submit" style="margin-left: -22px">Thêm vào giỏ</button>
                          </td>
                        </form>
                        <td>
                            <a href="{{route('get.delete.buy.before.product.user',$product->id)}}" style="margin-left: 20px">
                              <button class="btn action-btn btn-like btn-outline-danger btn-rounded">
                                  <i class="mdi mdi-delete"></i>
                              </button>
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
                    <p style="margin-bottom: 20px; margin-left: -129px;">Chọn "Mua sau" trong giỏ hàng với sản phẩm bạn muốn mua vào lần khác</p>
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

