@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="viewport-header">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb has-arrow">
                <li class="breadcrumb-item">
                    <a href="{{route('admin.dashboard')}}">Trang chủ</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{route('admin.get.list.article')}}">Bài viết</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Cập nhật</li>
                </ol>
            </nav>
        </div>
         @include('admin::article.form')
    </div>
</div>
@endsection
