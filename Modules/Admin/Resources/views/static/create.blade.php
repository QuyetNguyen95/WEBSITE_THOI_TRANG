@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <ul class="breadcrumb">
               <li><a href="{{route('admin.dashboard')}}">Trang chủ</a></li>
               <li><a href="{{route('admin.get.list.static')}}">Page Static</a></li>
                <li>Thêm mới</li>
            </ul>
           @include('admin::static.form')
        </div>
    </div>
</div>
@endsection