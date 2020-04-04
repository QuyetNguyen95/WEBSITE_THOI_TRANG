<div class="banner-area">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single-banner banner-space">
            <a href="{{route('get.detail.article',[$bannerProduct1['a_slug'],$bannerProduct1['id']])}}">
                <img src="{{pare_url_file($bannerProduct1['a_avatar'])}}" alt="" style="width: 360px; height: 246px;"/>
            </a>
          </div>
          <div class="single-banner">
             <a href="{{route('get.detail.product',[$bannerProduct2['pro_slug'],$bannerProduct2['id']])}}">
                <img src="{{pare_url_file($bannerProduct2['pro_avatar'])}}" alt="" style="width: 360px; height: 493px;"/>
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single-banner banner-space">
            <a href="{{route('get.detail.product',[$bannerProduct3['pro_slug'],$bannerProduct3['id']])}}">
                <img src="{{pare_url_file($bannerProduct3['pro_avatar'])}}" alt="" style="width: 360px; height: 493px;"/>
            </a>
          </div>
          <div class="single-banner">
            <a href="{{route('get.detail.product',[$bannerProduct4['pro_slug'],$bannerProduct4['id']])}}">
                <img src="{{pare_url_file($bannerProduct4['pro_avatar'])}}" alt="" style="width: 360px; height: 246px;"/>
            </a>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="single-banner banner-space">
            <a href="{{route('get.detail.product',[$bannerProduct5['pro_slug'],$bannerProduct5['id']])}}">
                <img src="{{pare_url_file($bannerProduct5['pro_avatar'])}}" alt="" style="width: 360px; height: 246px;"/>
            </a>
          </div>
          <div class="single-banner">
            <a href="{{route('get.detail.product',[$bannerProduct6['pro_slug'],$bannerProduct6['id']])}}">
                <img src="{{pare_url_file($bannerProduct6['pro_avatar'])}}" alt="" style="width: 360px; height: 493px;"/>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
