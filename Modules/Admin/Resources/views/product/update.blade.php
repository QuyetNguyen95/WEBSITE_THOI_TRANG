@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('admin.dashboard')}}">Trang chủ</a></li>
                <li><a href="{{route('admin.get.list.product')}}">Sản phẩm</a></li>
                <li>Cập nhật</li>
            </ul>
             @include('admin::product.form')
        </div>
    </div>
</div>
@endsection