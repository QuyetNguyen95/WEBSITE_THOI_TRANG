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
                    <a href="{{route('admin.get.list.category')}}">Danh mục</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                </ol>
            </nav>
        </div>
        <div class="row" style="margin-bottom: 40px;">
            <div class="col-md-12" style="display: flex">
                    <h2 class="title-1">Quản lý danh mục </h2>
                    <h2><a href="{{route('admin.get.create.category')}}"><i class="mdi mdi-library-plus" style="margin-left: 700px"></i></a></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                        <th>STT</th>
                        <th>Tên danh mục</th>
                        <th>Title Seo</th>
                        <th>Danh mục nổi bật</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @if(isset($categories))
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$stt}}</td>
                                <td>{{$category->c_name}}</td>
                                <td>{{$category->c_title_seo}}</td>
                                <td>
                                    <a href="{{route('admin.get.delete.category',['home',$category->id])}}" class="btn btn-xs {{$category->getHome()['class']}}">{{$category->getHome()['name']}}</a>
                                </td>
                                <td>
                                    <a href="{{route('admin.get.delete.category',['active',$category->id])}}" class="btn btn-xs {{$category->getStatus()['class']}}">{{$category->getStatus()['name']}}</a>
                                </td>
                                <td>
                                <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                <a href="{{route('admin.get.edit.category',$category->id)}}"> <i class="text-info mdi mdi-autorenew"></i></a>
                                </button>
                                <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                    <a href="{{route('admin.get.delete.category',['delete',$category->id])}}"> <i class="text-info mdi mdi-delete"></i></a>
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
@endsection
