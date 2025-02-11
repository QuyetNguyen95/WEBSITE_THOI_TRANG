@extends('admin::layouts.master')
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
                        <a href="{{route('admin.get.list.static')}}">Page tĩnh</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                    </ol>
                </nav>
            </div>
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-md-12" style="display: flex">
                        <h2 class="title-1">Quản lý trang tĩnh </h2>
                        <h2><a href="{{route('admin.get.create.static')}}"><i class="mdi mdi-library-plus" style="margin-left: 700px"></i></a></h2>
                </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tiêu đề trang</th>
                            <th>Ngày tạo</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $stt = 1; ?>
                            @if(isset($page_statics))
                              @foreach($page_statics as $page_static)
                               <tr>
                                <td>{{$stt}}</td>
                                 <td>{{$page_static->ps_name}}</td>
                                 <td>{{$page_static->updated_at}}</td>
                                 <td>
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                        <a href="{{route('admin.get.edit.static',$page_static->id)}}"> <i class="text-info mdi mdi-autorenew"></i></a>
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
</div>
@endsection
