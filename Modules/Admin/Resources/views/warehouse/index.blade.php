@extends('admin::layouts.master')
<style>
    .rating .active{
        color:#ff9705;
    }

    .selected {
        text-decoration: underline;
    }
</style>
@section('content')
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
                        <a href="{{route('admin.get.list.warehouse')}}">Kho hàng</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                    </ol>
                </nav>
            </div>
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-md-12" style="display: flex">
                        <h2 class="title-1">Quản lý Kho hàng </h2>
                        <h2 style="margin-left: 12px">
                            <a href="?type=selling" style="color: blue" class="{{Request::get('type') == 'selling' ||
                             Request::get('type') == NULL  ? 'selected' : ''}}">Hàng bán chạy</a> -
                            <a href="?type=inventory" style="color: red" class="{{Request::get('type') ==
                            'inventory' ? 'selected' : ''}}">Hàng tồn kho</a>
                        </h2>
                </div>
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
                             <th>Lượt bán</th>
                           </tr>
                         </thead>
                         <tbody>
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
                                       @if ($product->pro_active == 1)
                                            <button class="btn btn-xs btn-danger">Public</button>
                                       @else
                                             <button class="btn btn-xs btn-default">Private</button>
                                       @endif
                                   </td>
                                   <td>
                                        @if ($product->pro_hot == 1)
                                            <button class="btn btn-xs btn-info">Nổi bật</button>
                                        @else
                                                <button class="btn btn-xs btn-default">Không</button>
                                        @endif
                                   </td>
                                   <td>
                                        {{$product->pro_pay}}
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
</div>
{{$products->links()}}
@endsection
