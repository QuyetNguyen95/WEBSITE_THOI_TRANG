@extends('admin::layouts.master')
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container">
            <ul class="breadcrumb">
              <li><a href="#">Trang chủ</a></li>
              <li><a href="#">Danh mục</a></li>
              <li>Danh sách</li>
            </ul>
            <div class="row" style="margin-bottom: 40px">
                <div class="col-md-12">
                        <h2 class="title-1">Quản lý danh mục <a href="{{route('admin.get.create.category')}}" class="pull-right"><i class="fa fa-plus" style="margin-left: -134px"></i></a></h2>
                </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                   <table class="table">
                        <thead>
                          <tr>
                            <th>#</th>
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
                                      <a href="{{route('admin.get.delete.category',['home',$category->id])}}" class="label {{$category->getHome()['class']}}">{{$category->getHome()['name']}}</a>
                                  </td>
                                  <td>
                                      <a href="{{route('admin.get.delete.category',['active',$category->id])}}" class="label {{$category->getStatus()['class']}}">{{$category->getStatus()['name']}}</a>
                                  </td>
                                  <td>
                                    <a href="{{route('admin.get.edit.category',$category->id)}}" style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;"><i class="fa fa-edit"></i> Cập nhật</a>
                                    <a href="{{route('admin.get.delete.category',['delete',$category->id])}}" style="padding: 5px 10px;border: 1px solid #999; font-size: 12px;"><i class="glyphicon glyphicon-trash"></i> Xóa</a>
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