@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <ul class="breadcrumb">
              <li><a href="{{route('admin.dashboard')}}">Trang chủ</a></li>
              <li><a href="{{route('admin.get.list.static')}}">Page Static</a></li>
              <li>Danh sách</li>
            </ul>
            <div class="row" style="margin-bottom: 40px">
                <div class="col-md-12">
                        <h2 class="title-1">Quản lý trang tĩnh <a href="{{route('admin.get.create.static')}}" class="pull-right"><i class="fa fa-plus" style="margin-left: -134px"></i></a></h2>
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
                                    <a href="{{route('admin.get.edit.static',$page_static->id)}}" style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;"><i class="fa fa-edit"></i> Cập nhật</a>
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