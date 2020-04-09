@extends('admin::layouts.master')
@section('content')
<style>
    .rating .active{
        color:#ff9705;
    }
</style>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <div class="viewport-header">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb has-arrow">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.dashboard')}}">Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.get.list.product')}}">Sản phẩm</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                    </ol>
                </nav>
            </div>
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-md-12" style="display: flex">
                        <h2 class="title-1">Quản lý sản phẩm </h2>
                        <h2 style="margin-left: 700px"><a href="{{route('admin.get.create.product')}}"><i class="mdi mdi-library-plus" ></i></a></h2>
                </div>
            </div>
            </div>
            <div class="row" style="margin-bottom: 30px">
              <div class="col-md-12">
                 <form class="form-inline" >
                <div class="form-group">
                  <input type="text" class="form-control"  placeholder="Tên sản phẩm" id="myInput" name="name" value="{{Request::get('name')}}">
                </div>
                <div class="form-group" style="margin-left: 10px;margin-right: 10px;">
                   <select name="category" id="" class="form-control">
                      <option value="">Tên danh mục</option>
                      @if(isset($categories))
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{Request::get('category') == $category->id ? "selected = 'selected'" : ''}}>{{$category->c_name}}</option>
                        @endforeach
                      @endif
                   </select>
                </div>
                <button type="submit" class="btn btn-sm btn-outline-info"><i class="mdi mdi-magnify"></i></button>
              </form>
              </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Hình ảnh</th>
                            <th>Hình ảnh+</th>
                            <th>Trạng thái</th>
                            <th>Nổi bật</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody id="myTable">
                          <?php $stt = 1; ?>
                            @if(isset($products))
                              @foreach($products as $product)
                               <tr>
                                  <td>{{$stt}}</td>
                                  <td>{{$product->pro_name}}
                                    <ul style="list-style: none;margin-left: -38px;">
                                      <li>Loại sản phẩm: {{$product->pro_type}}</li>
                                      <li>Giá cả: {{$product->pro_price}} VNĐ</li>
                                      <li>Sale: {{$product->pro_sale}}%</li>
                                      <?php
                                        $averageRating = 0;
                                        if ($product->pro_total_rating > 0) {
                                            $averageRating = round($product->pro_total_number/$product->pro_total_rating,2);
                                        }

                                        ?>
                                      <li>Đánh giá:
                                        <div class="rating" style="color: #999;display: initial;">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <i class="mdi mdi-star {{$i <= $averageRating ? 'active' : ''}}"></i>
                                            @endfor
                                            /{{$averageRating}}
                                        </div>
                                      </li>
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
                                      <a href="{{route('admin.get.action.product',['active',$product->id])}}" class="btn btn-xs {{$product->getStatus()['class']}}">{{$product->getStatus()['name']}}</a>
                                  </td>
                                  <td>
                                      <a href="{{route('admin.get.action.product',['hot',$product->id])}}" class="btn btn-xs {{$product->getHot()['class']}}">{{$product->getHot()['name']}}</a>
                                  </td>
                                  <td>
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                    <a href="{{route('admin.get.edit.product',$product->id)}}"> <i class="text-info mdi mdi-autorenew"></i></a>
                                    </button>
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                        <a href="{{route('admin.get.action.product',['delete',$product->id])}}"> <i class="text-info mdi mdi-delete"></i></a>
                                    </button>
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
@section('script')
<script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    </script>
@endsection
