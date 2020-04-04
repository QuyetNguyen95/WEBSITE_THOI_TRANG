@extends('user.main')
@section('content')
<style>
    .rating .active{
        color:#ff9705;
    }
</style>
<div class="row">
    <div class="col-12 py-5">
    <h4>Quản lý sản phẩm bán chạy</h4>
    <p class="text-gray">Chào mừng {{Auth::user()->name}}</p>
    </div>
</div>
<div class="col-md-12 equel-grid">
    <div class="grid">
      <div class="grid-body py-3">
        <p class="card-title ml-n1" style="font-size: 16px;">Sản phẩm bán chạy</p>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-sm">
          <thead>
            <tr class="solid-header">
              <th>STT</th>
              <th colspan="2" class="pl-4">Sản phẩm</th>
              <th>Sale</th>
              <th>Đánh giá</th>
              <th>Lượt bán</th>
            </tr>
          </thead>
          <tbody>
             <?php $stt = 1; ?>
            @if (isset($bestSellProducts))
                @foreach ($bestSellProducts as $bestSellProduct)
                <tr>
                    <td>
                      {{$stt}}
                    </td>
                    <td class="pr-0 pl-4">
                        <a href="{{route('get.detail.product',[$bestSellProduct->pro_slug,
                            $bestSellProduct->id])}}">
                            <img class="profile-img img-sm" src="{{pare_url_file($bestSellProduct->pro_avatar)}}""
                            alt="profile image" style="width: 30px; height: 30px;">
                        </a>
                      </td>
                      <td class="pl-md-0">
                        <small class="text-black font-weight-medium d-block">
                            <span class="status-indicator rounded-indicator small bg-primary" style="display: inline-block;"></span>
                            <a href="{{route('get.detail.product',[$bestSellProduct->pro_slug,
                            $bestSellProduct->id])}}">{{mb_strtolower($bestSellProduct->pro_name)}}</a>
                            </small>
                        <span class="text-gray">
                          {{number_format($bestSellProduct->pro_price,0,'','.')}} đ </span>
                      </td>
                      <td>
                        <small>Giảm {{$bestSellProduct->pro_sale}}%</small>
                      </td>
                      <td>
                        <?php
                        $averageRating = 0;
                        if ($bestSellProduct->pro_total_rating > 0) {
                            $averageRating = round($bestSellProduct->pro_total_number/$bestSellProduct->pro_total_rating,2);
                        }

                        ?>
                        <div class="rating" style="color: #999;display: initial;">
                            @for ($i = 1; $i <= 5; $i++)
                                <i class="mdi mdi-star {{$i <= $averageRating ? 'active' : ''}}"></i>
                            @endfor
                            /{{$averageRating}}
                        </div>
                      </td>
                      <td>{{$bestSellProduct->pro_pay}}</td>
                  </tr>
                <?php  $stt++;?>
                @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{$bestSellProducts->links()}}
@endsection
