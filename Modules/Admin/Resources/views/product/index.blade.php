@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <ul class="breadcrumb">
              <li><a href="#">Trang chủ</a></li>
              <li><a href="#">Sản phẩm</a></li>
              <li>Danh sách</li>
            </ul>
            <div class="row" style="margin-bottom: 40px">
                <div class="col-md-12">
                        <h2 class="title-1">Quản lý sản phẩm <a href="{{route('admin.get.create.product')}}" class="pull-right"><i class="fa fa-plus" style="margin-left: -134px"></i></a></h2>
                </div>
            </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                 <form class="form-inline" >
                <div class="form-group">
                  <input type="text" class="form-control"  placeholder="Tên sản phẩm" name="name" value="{{Request::get('name')}}">
                </div>
                <div class="form-group">
                   <select name="category" id="" class="form-control">
                      <option value="">Tên danh mục</option>
                      @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{Request::get('category') == $category->id ? "selected = 'selected'" : ''}}>{{$category->c_name}}</option>
                        @endforeach
                      @endif
                   </select>
                </div>
                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
              </form>
              </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Hình ảnh+</th>
                            <th>Trạng thái</th>
                            <th>Nổi bật</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $stt = 1; ?>
                            @if(isset($products))
                              @foreach($products as $product)
                               <tr>
                                  <td>{{$stt}}</td>
                                  <td>{{$product->pro_name}}
                                    <ul style="list-style: none; margin-left: 12px">
                                      <li>Loại sản phẩm: {{$product->pro_type}}</li>
                                      <li>Giá cả: {{$product->pro_price}} VNĐ</li>
                                      <li>Sale: {{$product->pro_sale}}%</li>
                                      <li>Đánh giá:</li>
                                      <li>Số lượng: {{$product->pro_number}}</li>
                                      <li>Màu: {{$product->pro_color}}</li>
                                      <li>Size: {{$product->pro_size}}</li>
                                    </ul>
                                  </td>
                                  <td>{{isset($product->category->c_name) ? $product->category->c_name : 'N/A' }}</td>
                                  <td>
                                     <img src="{{pare_url_file($product->pro_avatar)}}" width="80px" height="80px">
                                  </td>
                                   <td>
                                     <img src="{{pare_url_file($product->pro_img)}}" width="80px" height="80px">
                                  </td>
                                   <td>
                                      <a href="{{route('admin.get.action.product',['active',$product->id])}}" class="label {{$product->getStatus()['class']}}">{{$product->getStatus()['name']}}</a>
                                  </td>
                                  <td>
                                      <a href="{{route('admin.get.action.product',['hot',$product->id])}}" class="label {{$product->getHot()['class']}}">{{$product->getHot()['name']}}</a>
                                  </td>
                                  <td>
                                    <a href="{{route('admin.get.edit.product',$product->id)}}" style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;"><i class="fa fa-edit"></i> Cập nhật</a>
                                    <a href="{{route('admin.get.action.product',['delete',$product->id])}}" style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
                                  </td>
                               </tr>
                               <?php $stt++; ?>
                              @endforeach
                            @endif
                        </tbody>
                  </table>
               </div>
            </div>
        </div>
    </div>
    <div class="">{{$products->appends($query)->links()}}</div>
</div>
@endsection
