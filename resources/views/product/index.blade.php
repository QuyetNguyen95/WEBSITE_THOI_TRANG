
@extends('layouts.app')
@section('content')
   <!-- blog-header-area start -->
   <div class="shop-header-area">
      <div class="container">
         <div class="row">
            <div class="col-md-12 col-sm-12">
               <div class="shop-header-title">
                  <h1>Shop All Products</h1>
                  <div class="shop-menu">
                     <ul>
                        @if (isset($category->c_name))
                            <li><a href="{{route('get.list.product',[$category->c_slug,$category->id])}}">{{$category->c_name}}</a></li>
                        @endif
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- blog-header-area end -->
   <!-- breadcrumb-area start -->
   <div class="breadcrumb-area shop-breadcrumb">
      <div class="container">
         <div class="breadcrumb">
            <ul>
               <li><a href="{{route('home')}}">Trang chủ <i class="fa fa-angle-right"></i></a></li>
               @if (isset($category->c_name))
               <li>{{$category->c_name}}</li>
               @endif
            </ul>
         </div>
      </div>
   </div>
   <!-- breadcrumb-area end -->
   <!-- blog-main-area start -->
   <div class="blog-main-area">
      <div class="container">
         <div class="row">
            <!-- sidebar start -->
            <div class="col-lg-3 col-md-3 col-sm-12">

                <!-- product type start -->
                <div class="shop-categories shop-space">
                    <h2 class="shop-sidebar-title"><span>Loại sản phẩm</span></h2>
                    <ul class="tag-list">

                        @if (isset($listProductTypes))
                            @foreach ($listProductTypes as $listProductType)
                              <li><a href="{{request()->fullUrlWithQuery(['type' => str_slug(str_replace(' ','-',$listProductType ))])}}"
                                   style="{{Request::get('type') == $listProductType ? 'background: white ;color:black; border: 1px solid #83cbdc;' : ''}}">
                                   {{$listProductType}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                 </div>
                 <!--  product type end -->
               <!--  product price range start -->
               <div class="shop-filter shop-space">
                  <h2 class="shop-sidebar-title"><span>Khoảng giá</span></h2>
                  <div class="info_widget">
                     <div class="filter-price">
                         <ul>
                             <li><a style="color: {{Request::get('price') == 1 ? 'red' : ''}} ;font-size: 17px;font-weight: 600;"
                                href="{{request()->fullUrlWithQuery(['price' => 1])}}">Dưới 100k</a></li>
                             <li><a style="color: {{Request::get('price') == 2 ? 'red' : ''}} ;font-size: 17px;font-weight: 600;"
                                 href="{{request()->fullUrlWithQuery(['price' => 2])}}">Từ 100k-300k</a></li>
                             <li><a style="color: {{Request::get('price') == 3 ? 'red' : ''}} ;font-size: 17px;font-weight: 600;"
                                 href="{{request()->fullUrlWithQuery(['price' => 3])}}">Từ 300k-500k</a></li>
                             <li><a style="color: {{Request::get('price') == 4 ? 'red' : ''}} ;font-size: 17px;font-weight: 600;"
                                 href="{{request()->fullUrlWithQuery(['price' => 4])}}">Từ 500k-700k</a></li>
                            <li><a  style="color: {{Request::get('price') == 5 ? 'red' : ''}} ;font-size: 17px;font-weight: 600;"
                                 href="{{request()->fullUrlWithQuery(['price' => 5])}}">Từ  700k-1000k</a></li>
                            <li><a  style="color: {{Request::get('price') == 6 ? 'red' : ''}} ;font-size: 17px;font-weight: 600;"
                                 href="{{request()->fullUrlWithQuery(['price' => 6])}}">Trên 1000k</a></li>
                         </ul>
                     </div>
                  </div>
               </div>
               <!-- product price range end -->
               <!-- product size start -->
               <div class="shop-categories shop-space">
                  <h2 class="shop-sidebar-title"><span>Size</span></h2>
                  <ul class="sidebar-menu">
                     <li><a  style="color: {{Request::get('size') == 'L' ? 'red' : ''}}
                     ;font-size: 17px;font-weight: 600;"  href="{{request()->fullUrlWithQuery(['size' => 'L'])}}">L</a></li>
                     <li><a style="color: {{Request::get('size') == 'M' ? 'red' : ''}}
                     ;font-size: 17px;font-weight: 600;" href="{{request()->fullUrlWithQuery(['size' => 'M'])}}">M</a></li>
                     <li><a style="color: {{Request::get('size') == 'S'? 'red' : ''}}
                     ;font-size: 17px;font-weight: 600;" href="{{request()->fullUrlWithQuery(['size' => 'S'])}}">S</a></li>
                     <li><a style="color: {{Request::get('size') == 'XL' ? 'red' : ''}}
                     ;font-size: 17px;font-weight: 600;" href="{{request()->fullUrlWithQuery(['size' => 'XL'])}}">XL</a></li>
                  </ul>
               </div>
               <!-- product size end -->
                <!-- product color start -->
                <div class="shop-categories shop-space">
                    <h2 class="shop-sidebar-title"><span>Color</span></h2>
                    <ul class="tag-list">
                        <li><a href="{{request()->fullUrlWithQuery(['color' => 'xanh'])}}"
                            style="{{Request::get('color') == 'xanh' ? 'background: white ;color:blue; border: 1px solid #919191;' : ''}}">
                            Xanh</a></li>
                        <li><a href="{{request()->fullUrlWithQuery(['color' => 'hong'])}}"
                            style="{{Request::get('color') == 'hong' ? 'background: white ;color:pink; border: 1px solid #919191;' : ''}}">
                            Hồng</a></li>
                        <li><a href="{{request()->fullUrlWithQuery(['color' => 'trang'])}}"
                            style="{{Request::get('color') == 'trang' ? 'background: #919191 ;color:white; border: 1px solid white;' : ''}}">
                            Trắng</a></li>
                        <li><a href="{{request()->fullUrlWithQuery(['color' => 'đen'])}}"
                            style="{{Request::get('color') == 'đen' ? 'background: white ;color:black; border: 1px solid #919191;' : ''}}">
                            Đen</a></li>
                        <li><a href="{{request()->fullUrlWithQuery(['color' => 'đỏ'])}}"
                            style="{{Request::get('color') == 'đỏ' ? 'background: white ;color:red; border: 1px solid #919191;' : ''}}">
                            Đỏ</a></li>
                        <li><a href="{{request()->fullUrlWithQuery(['color' => 'vang'])}}"
                            style="{{Request::get('color') == 'vang' ? 'background: white ;color:yellow; border: 1px solid #919191;' : ''}}">
                            Vàng</a></li>
                    </ul>
                 </div>
                 <!-- product color end -->
               <!-- shop-filter start -->
               <!-- shop-featured start -->
               <div class="shop-featured shop-space">
                  <h2 class="shop-sidebar-title"><span>Tin tức nỗi bật</span></h2>
                  @if ($hotArticles)
                     @foreach ($hotArticles as $hotArticle )
                     <div class="shop-product">
                        <div class="shop-pro-img">
                        <a href="{{route('get.detail.article',[$hotArticle->a_slug,$hotArticle->id])}}">
                            <img src="{{pare_url_file($hotArticle->a_avatar)}}" alt=""
                            style="width: 105px; height:140px;" class="responsive"/></a>
                        </div>
                        <div class="shop-pro-content">
                        <h3 class="shop-pro-name"><a href="{{route('get.detail.article',
                        [$hotArticle->a_slug,$hotArticle->id])}}">{{$hotArticle->a_name}}</a></h3>
                           <div>
                           <p  style="white-space: nowrap;overflow: hidden; text-overflow: ellipsis">
                            {{$hotArticle->a_description}}</p>
                            <p>Đọc thêm <i class="fa fa-arrow-right"></i></p>
                           </div>
                        </div>
                     </div>
                     @endforeach
                  @endif
               </div>
               <!-- shop-featured end -->
            </div>
            <!-- sidebar end -->
            <div class="col-lg-9 col-md-9 col-sm-12">
               <div class="row">
                  <!-- toolbar start -->
                  <div class="col-md-12 col-sm-12">
                     <div class="toolbar">
                        <div class="view-mode">
                           <a class="grid active" href="#"><i class="fa fa-th-large"></i></a>
                        </div>

                        <div class="show-result">
                           <p>Showing 1–12 of 20 results</p>
                        </div>
                        <div class="toolbar-form">
                           <form method="get" id="form_order">
                              <div class="tolbar-select">
                                 <p>Sắp xếp theo</p>
                                 <select name="order" class="order" style="width: 271px;border-radius: 65px;">
                                   <option value="default" {{Request::get('order') == 'default' || !(Request::get('order')) ? "selected = 'selected'" : ''}}>Mặc định</option>
                                   <option value="old" {{Request::get('order') == 'old' ? "selected = 'selected'" : ''}}>Sản phẩm củ</option>
                                   <option value="new" {{Request::get('order') == 'new' ? "selected = 'selected'" : ''}}>Sản phẩm mới nhất</option>
                                   <option value="increment" {{Request::get('order') == 'increment' ? "selected = 'selected'" : ''}}>Thứ tự theo giá: thấp đến cao</option>
                                   <option value="decrement" {{Request::get('order') == 'decrement' ? "selected = 'selected'" : ''}}>Thứ tự theo giá: cao đến thấp</option>
                                 </select>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- toolbar end -->
                  <!-- shop-product-details start -->
                  <div class="shop-product-details">
                     <!-- single-features start -->
                     @if(isset($listProduct))
                        @foreach($listProduct as $singleProduct)
                           <div class="col-md-4 col-sm-4">
                              <div class="single-features">
                                 @if($singleProduct->pro_sale > 0)
                                    <span class="sale-text">-{{$singleProduct->pro_sale}}%</span>
                                 @endif
                                 <div class="product-img">
                                    <a href="{{route('get.detail.product',[$singleProduct->pro_slug,$singleProduct->id])}}">
                                       <img class="first-img" src="{{pare_url_file($singleProduct->pro_avatar)}}"
                                        alt="" style="width: 262px; height: 345px;" />
                                       <img class="second-img" src="{{pare_url_file($singleProduct->pro_img)}}"
                                        alt="" style="width: 262px; height: 345px;" />
                                    </a>
                                    <a class="modal-view" href="{{route('get.quickView.product',$singleProduct->id)}}" >Quick View</a>
                                    <div class="action-buttons">
                                       <a class="add-to-cart" href="#"><i class="fa fa-shopping-cart"></i> <span>Thêm vào giỏ</span></a>
                                       <a class="favourite" href="#"><i class="fa fa-heart-o"></i></a>
                                       <a class="compare" href="{{route('get.detail.product',
                                       [$singleProduct->pro_slug,$singleProduct->id])}}"><i class="fa fa-toggle-off"></i></a>
                                    </div>
                                 </div>
                                 <div class="product-content">
                                    <div class="pro-rating">
                                       <a href="#"><i class="fa fa-star"></i></a>
                                       <a href="#"><i class="fa fa-star"></i></a>
                                       <a href="#"><i class="fa fa-star"></i></a>
                                       <a href="#"><i class="fa fa-star-o"></i></a>
                                    </div>
                                    <h5><a href="{{route('get.detail.product',[$singleProduct->pro_slug,$singleProduct->id])}}"
                                        style="text-overflow: ellipsis; overflow: hidden;white-space: nowrap;">
                                        {{$singleProduct->pro_name}}</a></h5>
                                    @if($singleProduct->pro_sale > 0)
                                       <span class="old-price">{{number_format($singleProduct->pro_price,0,'','.')}} đ</span>
                                       <span class="pro-price">{{get_cal_sale($singleProduct->pro_price,$singleProduct->pro_sale)}} đ</span>
                                    @else
                                       <span class="pro-price">{{number_format($singleProduct->pro_price,0,'','.')}} đ</span>
                                    @endif
                                 </div>
                              </div>
                           </div>
                        @endforeach
                        @endif


                     <!-- single-features end -->
                  </div>
                  <!-- shop-product-details end -->
                  <!-- toolbar start -->
                  <div class="col-md-12 col-sm-12">
                     <div class="toolbar toolbar-border">
                        <div class="page-number">
                        {{$listProduct->appends($query)->links()}}
                        </div>
                     </div>
                  </div>
                  <!-- toolbar end -->
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- blog-main-area end -->
    <!-- QUICKVIEW PRODUCT -->
  <div id="quickview-wrapper">
      <!-- Modal -->
      <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                  </div>
                  <div class="modal-body">
                      <!-- .modal-product -->
                  </div>
                  <!-- .modal-body -->
              </div>
              <!-- .modal-content -->
          </div>
          <!-- .modal-dialog -->
      </div>
      <!-- END Modal -->
  </div>
  <!-- END QUICKVIEW PRODUCT -->
@stop
@section('quick')
  <script type="text/javascript">
    $(function(){
      $(".modal-view").click(function(e){
        e.preventDefault();
        let $this = $(this);
        let url = $this.attr('href');
        $(".modal-body").html('');// set lại phiên modal bằng rỗng
        $("#productModal").modal('show');
        $.ajax({
          url : url
        }).done(function(result){
            if(result)
            {
              $(".modal-body").append(result);
            }
        })
      })
    })
  </script>
@stop
@section('script')
   <script>
      $(function(){
         $(".order").change(function(){
            $("#form_order").submit();
            //tra ve ?orderby=desc, ?orderby=asc ....
         })
      })
   </script>
@stop
