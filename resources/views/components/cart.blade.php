<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="cat-search">
              <div class="cart-total">
                <ul>
                <li><a href="{{route('show.products.shopping')}}"><span class="cart-icon"><i class="fa fa-shopping-cart"></i></span> <span class="cart-no">{{Cart::count()}}</span></a>
                    <div class="mini-cart-content">
                        <?php $orders = Cart::content();?>
                        @foreach ($orders as $order)
                        <div class="cart-img-details">
                            <div class="cart-img-photo">
                                <a href="#"><img src="{{pare_url_file($order->options->avatar)}}" alt=""  style="width: 50px; height: 67px;"/></a>
                            <span class="quantity">{{$order->qty}}</span>
                            </div>
                            <div class="cart-img-contaent">
                                <a href="#" >
                                    <h4 style="text-overflow: ellipsis;white-space: nowrap; overflow: hidden; width: 160px;">{{$order->name}}</h4></a>
                                <span>{{number_format($order->price,0,'','.')}} đ</span>
                            </div>
                            <div class="pro-del"><a href="{{route('delete.products.shopping',$order->rowId)}}"><i class="fa fa-times-circle"></i></a></div>
                        </div>
                        <div class="clear"></div>
                        @endforeach
                      <p class="total">Tổng: <span class="amount">{{Cart::subtotal(0,'.','.')}}</span></p>
                      <div class="clear"></div>
                      @if (Cart::count() > 0)
                      <p class="cart-button-top"><a href="{{route('get.pay.shopping')}}">Thanh toán</a></p>
                      @else
                      <p class="cart-button-top"><a href="#">Giỏ hàng rỗng</a></p>
                      @endif
                    </div>
                  </li>
                </ul>
              </div>
              <div class="header-search">
                <div class="top-category">
                  <ul>
                    <li class="search-top">
                      <form action="{{route('get.product.list')}}">
                      <input type="text" placeholder="Tìm kiếm sản phẩm..." name="key" value="{{Request::get('key')}}"/>
                        <button type="submit"><i class="fa fa-search"></i></button>
                      </form>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
