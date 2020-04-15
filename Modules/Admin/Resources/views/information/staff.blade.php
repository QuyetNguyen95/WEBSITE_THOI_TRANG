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
                        <a href="{{route('admin.get.list.user')}}">Nhân viên</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                    </ol>
                </nav>
            </div>
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-md-12" style="display: flex">
                        <h2 class="title-1">Quản lý thành viên </h2>
                </div>
            </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tên nhân viên</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Hình ảnh</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $stt =1; ?>
                           @if($users)
                            @foreach($users as $user)
                              <tr>
                                <td>{{$stt}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>
                                    <img src="{{pare_url_file($user->avatar)}}" alt="" style="width: 60px; height: 60px;">
                                </td>
                                <td>
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                        <a href="{{route('admin.get.action.staff',['delete',$user->id])}}"> <i class="text-info mdi mdi-delete"></i></a>
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
