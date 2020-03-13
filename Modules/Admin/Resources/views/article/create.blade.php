@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="#">Trang chủ</a></li>
                <li><a href="#">Bài viết</a></li>
                <li>Thêm mới</li>
            </ul>
           @include('admin::article.form')
        </div>
    </div>
</div>
@endsection