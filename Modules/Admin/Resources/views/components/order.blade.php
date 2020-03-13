
@if(isset($orders))
	<table class="table">
	    <thead>
	      <tr>
	        <th>STT</th>
	        <th>Tên sản phẩm</th>
	        <th>Hình ảnh</th>
            <th style="padding-left: 30px;">Giá</th>
            <th>Giá sale</th>
	        <th>Số lượng</th>
	        <th>Thành tiền</th>
	        <th>Thao Tác</th>
	      </tr>
	    </thead>
	    <tbody>
	    	<?php $i = 1; ?>
	    	@foreach($orders as $key => $order)
	      <tr>
	      	<td>#{{$i}}</td>
            <td><a href="{{route('get.detail.product',[str_slug($order->product->pro_name),$order->or_product_id])}}" target="_blank">
                {{isset($order->product->pro_name) ? $order->product->pro_name : ''}}</a>
                <ul style="list-style-type: none;">
                    <li>Color: {{$order->or_color}}</li>
                    <li>Size: {{$order->or_size}}</li>
                </ul>
            </td>
	        <td>
	        	<img src="{{isset($order->product->pro_avatar) ? pare_url_file($order->product->pro_avatar) : ''}}" style="width: 60px; height: 70px;" alt="">
	        </td>
	        <td>{{number_format($order->or_price,0,',','.')}} đ</td>
	        <td>{{number_format($order->or_price*(1-$order->product->pro_sale/100),0,',','.')}} đ</td>
	        <td style="padding-left: 33px;">{{$order->or_qty}}</td>
	        <td>{{number_format($order->or_price*$order->or_qty,0,',','.')}}đ</td>
	        <td>
	        	<a href="{{route('admin.get.delete.transaction',$order->id)}}" class="js_delete"><i class="fa fa-trash-o"></i> Delete</a>
	        	{{-- xoa theo key cua san pham --}}
	        </td>
	      </tr>
	     <?php $i++; ?>
	    	@endforeach
	    </tbody>
 </table>
@endif
