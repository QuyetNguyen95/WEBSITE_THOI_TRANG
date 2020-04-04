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
                    <a href="{{route('admin.get.list.static')}}">Page tĩnh</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Thêm mới</li>
                </ol>
            </nav>
        </div>
        @include('admin::static.form')
    </div>
</div>
@endsection
