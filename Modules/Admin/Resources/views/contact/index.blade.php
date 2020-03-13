@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <ul class="breadcrumb">
              <li><a href="#">Trang chủ</a></li>
              <li><a href="#">Liên hệ</a></li>
              <li>Danh sách</li>
            </ul>
            <div class="row" style="margin-bottom: 40px">
                <div class="col-md-12">
                        <h2 class="title-1">Quản lý liên hệ</h2>
                </div>
            </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th style="width: 200px">Tiêu đề</th>
                            <th>Họ tên</th>
                            <th>Email</th>
                            <th style="width: 300px">Nội dung</th>
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
                                     @if($contact->c_status == 1)
                                        <a href="" class="label label-success">Đã xử lý</a>
                                     @else
                                        <a href="{{route('admin.get.action.contact',['active',$contact->id])}}" class="label label-default">Chưa xử lý</a>
                                     @endif
                                  </td>
                                  <td>
                                    <a href="{{route('admin.get.action.contact',['delete',$contact->id])}}" style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
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