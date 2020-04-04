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
                        <a href="{{route('admin.get.list.contact')}}">Liên hệ</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
                    </ol>
                </nav>
            </div>
            <div class="row" style="margin-bottom: 40px;">
                <div class="col-md-12" style="display: flex">
                    <h2 class="title-1">Quản lý liên hệ </h2>
                </div>
            </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>STT</th>
                            <th>Tiêu đề</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th >Nội dung</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $stt = 1; ?>
                            @if($contacts)
                              @foreach($contacts as $contact)
                                <tr>
                                  <td>{{$stt}}</td>
                                  <td>{{$contact->c_title}}</td>
                                  <td>{{$contact->c_name}}</td>
                                  <td>{{$contact->c_email}}</td>
                                  <td>{{$contact->c_content}}</td>
                                  <td>
                                    <a href="{{route('admin.get.action.contact',['active',$contact->id])}}" class="btn btn-xs {{$contact->getStatus()['class']}}">{{$contact->getStatus()['name']}}</a>
                                  </td>
                                  <td>
                                    <button class="btn action-btn btn-refresh btn-outline-primary btn-rounded component-flat">
                                        <a href="{{route('admin.get.action.contact',['delete',$contact->id])}}"> <i class="text-info mdi mdi-delete"></i></a>
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
