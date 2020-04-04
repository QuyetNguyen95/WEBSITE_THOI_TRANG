
<style>
    .rating .active{
        color:#ff9705;
    }
</style>

<div class="row">
    <div class="col-md-12 equel-grid">
        <div class="grid">
          <div class="grid-body py-3">
            <p class="card-title ml-n1" style="font-size: 16px;">Sản phẩm vừa xem</p>
          </div>
          <div class="table-responsive">
            <table class="table table-hover table-sm">
              <thead>
                <tr class="solid-header">
                  <th colspan="2" class="pl-4">Sản phẩm</th>
                  <th>Sale</th>
                  <th>Đánh giá</th>
                </tr>
              </thead>
              <tbody>
                @if($justWatchProducts)
                @foreach($justWatchProducts as $justWatchProduct)
                <tr>
                  <td class="pr-0 pl-4">
                    <a href="{{route('get.detail.product',[$justWatchProduct->pro_slug,
                        $justWatchProduct->id])}}">
                        <img class="profile-img img-sm" src="{{pare_url_file($justWatchProduct->pro_avatar)}}""
                        alt="profile image" style="width: 30px; height: 30px;">
                    </a>
                  </td>
                  <td class="pl-md-0">
                    <small class="text-black font-weight-medium d-block">
                        <span class="status-indicator rounded-indicator small bg-primary" style="display: inline-block;"></span>
                        <a href="{{route('get.detail.product',[$justWatchProduct->pro_slug,
                        $justWatchProduct->id])}}">{{mb_strtolower($justWatchProduct->pro_name)}}</a>
                        </small>
                    <span class="text-gray">
                      {{number_format($justWatchProduct->pro_price,0,'','.')}} đ </span>
                  </td>
                  <td>
                    <small>Giảm {{$justWatchProduct->pro_sale}}%</small>
                  </td>
                  <td>
                    <?php
                    $averageRating = 0;
                    if ($justWatchProduct->pro_total_rating > 0) {
                        $averageRating = round($justWatchProduct->pro_total_number/$justWatchProduct->pro_total_rating,2);
                    }

                    ?>
                    <div class="rating" style="color: #999;display: initial;">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="mdi mdi-star {{$i <= $averageRating ? 'active' : ''}}"></i>
                        @endfor
                        /{{$averageRating}}
                    </div>
                  </td>
                </tr>
                @endforeach
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
